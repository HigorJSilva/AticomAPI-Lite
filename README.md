# Aticom API Lite

Essa aplicação funciona como um backend simplificado da aplicação Aticom. Assim como a aversão completa, esta foi criada com o intuito de auxiliar o aluno no controle e acompanhamento de suas atividades, porém a complexidade da versão anterior exigia a manuntenção por parte do responsavel pelas Atividades Complementares do curso, a versão Lite encontra apenas o módulo de alunos, permitindo a completa independencia do estudante durante o período de participação das atividades.

## Funções da versão Lite

### Atividades

 São as atividades complementares que você realizou durante o período de realização do curso (Atividades realizadas antes desse período serão rejeitadas pela secretaria acadêmica).
 
#### Regras e validações estão no arquivo AtividadesRequest.
-   Cadastro;
-    Edição;
-    Listagem;
-    Remoção.
   
### Atividades de Referência 

São os tipos de atividades que seão aceitas pelo curso como atividades complementares, caso você fez um curso de idiomas a sua atividade de referência é "Participação com aproveitamento em cursos de língua". Por padrão as atividades carregadas são do documento disponibiliazado 26/11/2021.
####  Regras e validações estão no arquivo ReferenciasRequest.
- Cadastro;
- Edição;
- Listagem;
- Remoção.

### Modalidades

São os módulos os quais as atividades são divididas, cada módulo foi pré-carregado e possui uma carga horária minima e máxima que pode ser editado conforme a necessidade.
 #### Regras e validações estão no arquivo ModalidadesRequest.
  
- Edição;
- Listagem;
- Listar Progresso

### Usuários

Aqui você altera os dados de usuário para ter informações corretas conforme os dados de sua matriz. Nome e CPF serão utilizados para montar a planílha final (caso seja implementada),

  #### Regras e validações estão no arquivo UsersRequest.
- Edição;
- Listagem;

 ### Certificados
 
 Caso queira você pode salvar os seus certificados em uma pasta no diretório da aplicação
 
 #### Regras e validações estão no arquivo CertificadosRequest.
  
-   Cadastro;
-   Edição;
-   Listagem;
-   Remoção.

