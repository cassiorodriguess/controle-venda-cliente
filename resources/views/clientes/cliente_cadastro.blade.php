<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CADASTRO DE CLIENTES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 @include ('includes/navbar');
 @include('includes/menu');

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Cadastrar cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">cliente</a></li>
              <li class="breadcrumb-item active">cadastro</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12"> 
             @if(session()->has('success') || isset($atual) )
             <div class="card card-success">
                <div class="card-header">
                  @if(!isset($atual))
                  {{session()->get('success') }}
                  @else
                  Dados atualizados com sucesso
                  @endif 
                 </div>
              </div>
              @endif
              @if($errors->any())
                 @foreach(                
                  $errors->all() as $error)  
                  <div class="card card-danger">  
                    <div class="card-header">                  
                      {{ $error }}
                    </div>
                  </div>
                @endforeach               
               @endif
              @if(!isset($dados))   
              @php 
                $nome = "";
                $email = "";
                $data = "";
                $telefone = ""; 
                $cpf = "";
                $complemento = "";
                $data_nasc = "";
                $logradouro = "";
                $bairro = "";
                $cidade = "";
                $numero = "";  
                $estado ="";
                $cep = "";
                $identidade = "";
              @endphp
                         
              <form class="form-horizontal" method="POST" action="{{url('/cad_cliente')}}">
              @else
           
              @php 
                $nome = $dados->nome;              
                $email = $dados->email;
                $telefone = $dados->telefone; 
                $cpf = $dados->cpf;
                $complemento = $dados->complemento;
                $data_nasc = $dados->data_nascimento;
                $logradouro = $dados->logradouro;
                $bairro = $dados->bairro;
                $cidade = $dados->cidade;
                $numero = $dados->numero;  
                $data = $dados->data_nascimento;
                $data = substr($data,0,10);  
                $estado = $dados->estado;
                $cep = $dados->cep;
                $identidade = $dados->identidade;
              @endphp
              <form class="form-horizontal" method="POST" action="{{url('/cliente_atual')}}">             
              @endif
               {{csrf_field()}}
                <div class="card-body">
                  
                  @if(isset($dados))
                  <input type="hidden" name="idcliente" value="{{$dados->id}}">
                  @endif 
                  <input type="text" hidden name="cliente_id" value="{{$logado}}">  
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Nome</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$nome}}" class="form-control" name="nome" placeholder="Nome">
                    </div>
                  </div>
                  @if(isset($_GET['servico']))
                  <input type="text" name="servicos" hidden value="servicos">
                  @endif                   
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$email}}" class="form-control" name="email"  placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Telefone</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$telefone}}" class="form-control" name="telefone"  placeholder="Telefone">
                    </div>
                  </div>                 
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">CPF</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$cpf}}" class="form-control" name="cpf" placeholder="CPF">
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Identidade</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$identidade}}" class="form-control" name="identidade" placeholder="Identidade">
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">CEP</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$cep}}" class="form-control" name="cep" placeholder="CEP">
                    </div>
                  </div> 


           
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Rua</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$logradouro}}" class="form-control" name="logradouro" placeholder="Rua">
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Número</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$numero}}" class="form-control" name="numero" placeholder="Número">
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Complem.</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$complemento}}" class="form-control" name="complemento" placeholder="Complemento">
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Bairro</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$bairro}}" class="form-control" name="bairro" placeholder="Bairro">
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Cidade</label>
                    <div class="col-sm-11">
                      <input type="text" value="{{$cidade}}" class="form-control" name="cidade" placeholder="Cidade">
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Estado</label>
                    <div class="col-sm-11">
                      <input type="text" maxlength="2" value="{{$estado}}" class="form-control" name="estado" placeholder="Estado">
                    </div>
                  </div>             
                  <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Nasc.</label>
                    <div class="col-sm-11">
                      <input type="date"  value="{{$data}}"  class="form-control" name="data_nascimento" placeholder="">
                    </div>
                  </div>   
                </div>
                <!-- /.card-body -->
                @if(!isset($dados))
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Cadastrar</button>
                  <a href="{{url('/cliente_cadastro')}}" class="btn btn-default float-right">Cancelar</a>
                </div>
                @else
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Atualizar</button>
                  <a href="{{url('/cliente_cadastro')}}" class="btn btn-default float-right">Cancelar</a>
                </div>
                @endif  

                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
       
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
