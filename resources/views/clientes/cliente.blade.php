<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CLIENTES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include ('includes/navbar');

@include('includes/menu');

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clientes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section  class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12"> 
          @if(isset($pr) || isset($d) || isset($atual) || isset($categoriaatual) || session()->has('success') || session()->has('successmail')   )
             <div class="card card-success">
                <div class="card-header">
                  @if(isset($pr))
                  Produto cadastrado com sucesso
                  @endif
                  @if(isset($d))
                  Categoria cadastrada com sucesso
                  @endif
                  @if(isset($atual))
                  Produto atualizado com sucesso
                  @endif
                  @if(isset($categoriaatual))
                  Categoria atualizada com sucesso
                  @endif  
                  @if(session()->has('success'))
                  Item deletado com sucesso
                  @endif         
                  @if(session()->has('successmail'))
                  Sua mensagem foi enviada
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
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if(session()->has('success') )
             <div class="card card-success">
                <div class="card-header">
                  {{session()->get('success')}}        
                 </div>                
              </div>
             @endif
            <div class="card">
              <div class="card-header">

              <a href="{{url('/cliente_cadastro')}}" class="btn btn-success active"><i class="fas fa-plus"></i> Novo cliente</a>
          
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cliente as $cl)    
                  @php 
                     $data = date("d-m-Y",strtotime($cl->data_nascimento));    
                  @endphp
                  <tr>
                    <td>{{$cl->nome}}</td> 
                    <td>{{$cl->cpf}}</td>  
                    <td>{{$cl->email}}</td>  
                    <td>{{$cl->telefone}}</td>     
                    <td>{{$cl->logradouro}} {{$cl->numero}} {{$cl->complemento}}</td>   
                    <td>{{$cl->bairro}}</td>   
                    <td>{{$cl->cidade}}</td>
                <!--     <td>{{$data}}</td>  -->
                    <td>  <a href="{{url('edit', ['id' => $cl->id])}}"><i class="fas fa-edit"></i></a></td>  
                    <td>  <a href="{{url('delete_cliente', ['id' => $cl->id])}}"><i class="fas fa-trash"></i></a></td>  
                  </tr>
                  @endforeach              
                  </tbody>
      
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
  <section>
  
  <!-- Modal -->
<div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enviar via email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('/Email')}}" method="POST"  enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="form-group"> 
            <input  type="text" name="email" class="form-control" placeholder="Digite o email a ser enviado">
             <br>
              <textarea placeholder="Mensagem" name="msg" id="mytextarea" class="form-control"></textarea>    
              <br>
             <label for="">Anexar arquivo</label><br>
             <div class="anexo">    
              <button class="btn btn-light" style="border:1px solid #ccc" id="buttonfile"  type="button"> <i class="fas fa-paperclip"></i> </button>    
              <input id="file" type="file" hidden name="file"> <span id="namefile"></span>
             </div>
            <br>
        </div>          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-success" type="submit"> <i class="fas fa-reply"></i> Enviar </button>      
      </div>
      </form>
    </div>
  </div>
</div>
  
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "ordering": false,
    });  
  });
</script>
</body>
</html>
