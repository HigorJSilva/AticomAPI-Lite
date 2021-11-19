<?php

namespace App\Services;

use App\Helpers\Resposta;
use App\Models\Certificados;
use Exception;
use Illuminate\Support\Facades\Storage;
use stdClass;

class CertificadosService extends CrudService
{

    public function getModel($data = [])
    {
        return new Certificados($data);
    }

    protected function prepareSave($data, $additionalData)
    {

        $data['caminho'] =  $this->salvaCertificado($data["certificado"]);
        unset($data['certificado']);
        return $data;
    }

    protected function prepareUpdate($model, $data, $additionalData)
    {
        $finalData = $finalData = parent::prepareUpdate($model, (array) $data, $additionalData);

        $retorno = $this->removerCertificado($model->caminho);

        if (!$retorno) {
            return Resposta::object(false, 'erro ao remover certificado', null, null);
        }
        $finalData = $this->alteraCertificado($data);

        return $finalData;
    }

    public function deactivate($id)
    {
        try {
            $model = $this->getModel()->findOrFail($id);
            $authorize = $this->authorize('delete', $model);

            if (!$authorize->status) {
                return $authorize;
            }
            $retorno = $this->removerCertificado($model->caminho);

            if (!$retorno) {
                return Resposta::object(false, 'erro ao remover certificado', null, null);
            }

            $model->delete();
            
            return Resposta::object(true, null, null, null);
        } catch (Exception $exception) {
            return $this->tratamentoExceptions($exception, new stdClass());
        }
    }

    private function removerCertificado(string $caminho)
    {
        try {
            return  Storage::delete((str_replace('/', DIRECTORY_SEPARATOR, $caminho)));
        } catch (Exception $exception) {
            return  $this->tratamentoExceptions($exception, new stdClass());
        }
    }

    private function alteraCertificado($data)
    {
        $data['caminho'] =  $this->salvaCertificado($data["certificado"]);
        unset($data['certificado']);
        return $data;
    }

    private function salvaCertificado($certificado)
    {
        return $certificado->store('certificados');
    }
}
