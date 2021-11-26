<?php

namespace App\Services;

use App\Helpers\Resposta;
use App\Models\Atividades;
use App\Models\Matrizes;
use App\Models\Modalidades;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class ModalidadesService extends CrudService
{

    private $modalidades;
    private $atividades;
    private $matriz;

    private $somaDeHorasAtividades = [];
    private $somaDeHorasByRegime = [];

    public function getModel($data = [])
    {
        return new Modalidades($data);
    }

    protected function prepareUpdate($model, $data, $additionalData)
    {
        $finalData = $finalData = parent::prepareUpdate($model, (array) $data, $additionalData);
        return $finalData;
    }

    public function getProgresso(): Resposta
    {
        $aluno = User::find(1);
        $this->atividades = Atividades::where(['alunoId' => $aluno->id])->get();

        $atividadesPorModulo = $this->getAtividadesPorModulo();

        $this->getSomaAtividades($atividadesPorModulo);

        $this->matriz = Matrizes::find($aluno->matrizId);
        $cargaHorariaMatriz = $this->matriz->cargaHoraria;

        //TODO progresso total de carga horária

        $progresso = [
            'requisitoCargaHoraria' =>  $this->getProgressoTotal($cargaHorariaMatriz),
            'requisitosPorModulo' => $this->getProgressoPorModulo($cargaHorariaMatriz),
            'requisitoPresencial' => $this->getProgressoPresencial($cargaHorariaMatriz)
        ];


        return Resposta::object(true, null,  $progresso, null);
    }

    private function getSomaAtividades(array $atividadesPorModulo)
    {
        foreach ($atividadesPorModulo as $key => $atividade) {
            $this->somaDeHorasAtividades[$key] =  $atividade->sum('horasConsideradas');
            $this->somaDeHorasByRegime[$key] = $this->somaDeHorasByRegime($atividade);
        }
    }

    private function getAtividadesPorModulo()
    {
        $this->modalidades = Modalidades::all();
        $data = [];
        foreach ($this->modalidades as $key => $modulo) {
            $data[$key] = $this->filterCollection($modulo->id);
        }
        return $data;
    }

    private function filterCollection($moduloId): Collection
    {
        $filtrado = $this->atividades->filter(function ($value, $key) use ($moduloId) {
            return $value->referencias->modalidadeId == $moduloId;
        });

        return $filtrado;
    }

    private function somaDeHorasByRegime()
    {
        $regimeAtividade = new stdClass();

        $this->atividades->sum(function ($product) use (&$regimeAtividade) {
            if ($product->presencial) {
                $regimeAtividade->presencial = $product->horasConsideradas;
                return $product->horasConsideradas;
            }
            $regimeAtividade->distancia = $product->horasConsideradas;
            return $product->horasConsideradas;
        });

        return $regimeAtividade;
    }

    private function getProgressoPorModulo(string $cargaHorariaMatriz)
    {
        $progresso = [];

        foreach ($this->somaDeHorasAtividades as $key => $somaDeHorasAtividadesPorModulo) {

            $progresso[$key] = "{$this->modalidades[$key]->nome}: ";

            $cargaHorariaMax = $cargaHorariaMatriz * ($this->modalidades[$key]->cargaHorariaMax) / 100;
            $cargaHorariaMin = $cargaHorariaMatriz * ($this->modalidades[$key]->cargaHorariaMin) / 100;
            
            switch (true) {
                case $somaDeHorasAtividadesPorModulo < $cargaHorariaMin:
                    $resultado = $cargaHorariaMin - $somaDeHorasAtividadesPorModulo;
                    $progresso[$key] .=
                        "Requisito mínimo incompleto: restam {$resultado} horas para completar o requisito mínimo";
                    break;

                case $somaDeHorasAtividadesPorModulo >= $cargaHorariaMax:
                    $progresso[$key] .=
                        'Módulo completo. Sem horas disponíveis';
                    break;

                default:
                    $resultado = $cargaHorariaMax - $somaDeHorasAtividadesPorModulo;
                    $progresso[$key] .=
                        "Requisito mínimo completo: {$resultado} horas ainda disponíveis";
                    break;
            }
        }
        return $progresso;
    }

    private function getProgressoPresencial(string $cargaHorariaMatriz)
    {
        $horasEad = 0;

        foreach ($this->somaDeHorasByRegime as $key => $horasPorRegime) {
            $horasEad += $horasPorRegime->distancia;
        }

        $horasAceitas = $cargaHorariaMatriz / 2;

        if ($horasEad <= $horasAceitas) {
            $horasRestantes = $horasAceitas - $horasEad;
            return "Você tem {$horasEad} Horas, ainda pode realizar {$horasRestantes} horas à distância";
        }

        return "Não será aceito mais de {$horasAceitas} horas à distância. Você tem {$horasEad} Horas";
    }

    private function getProgressoTotal(string $cargaHorariaMatriz)
    {
        $horasTotais = array_sum($this->somaDeHorasAtividades);

        if($horasTotais >= $cargaHorariaMatriz){
            return "Requisito completo: {$horasTotais} horas realizadas";
        }
        $horasRestantes = $cargaHorariaMatriz - $horasTotais;
        return "Requisito incompleto: {$horasRestantes} restantes";
    }
}
