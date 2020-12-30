<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CADASTRO DE PRODUTO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include ('includes/navbar');  <!-- Main Sidebar Container -->
  @include('includes/menu');
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Lista de produtos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">produto</a></li>
              <li class="breadcrumb-item active">cadastro</li>
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



    <br>

    <!-- Fim categorias - inicio section produtos -->

     <section id="section_produtos" class="content">
      <div class="container-fluid">
          
        <div class="row">
          <!-- left column -->
         
            <!-- /.card -->
            <div class="col-md-12">    
            <div class="card">
              <div class="card-header">
<!--                 <h3 class="card-title">Lista de produtos</h3>   -->               
              <button id="add_produto_button" class="btn btn-success"> <i class="fas fa-plus"></i> Novo produto </button>
              <button class="btn btn-light active" id="exportar_button"><i class="fas fa-file-pdf"></i> Exportar para pdf</button>
            </div>
          
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Titulo</th>    
                    <th>Comprado por</th>  
                    <th>Vendendo a</th>     
                    <th>Categoria</th>    
                    <th>Estoque</th>    
                    <th>Editar</th>   
                    <th>Excluir</th>   
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($produtos as $produto)              
                  <tr>
                    <td>
                      <a class="produtct_title" style="color:#000;text-decoration:underline" href="#">{{$produto->titulo}}</a> 
                      @php 
                       $data_cr = date("d-m-Y H:i:s",strtotime($produto->created_at));
                       $data_up = date("d-m-Y H:i:s",strtotime($produto->updated_at));
                      @endphp
                      <span class="product_desc"> <br>{{$produto->descricao}}<br>Criado em {{$data_cr}}<br>@if($produto->created_at!=$produto->updated_at)Modificado em {{$data_up}}@endif<br></span>
                    </td> 
                    <td>R$ {{$produto->valor}}</td>
                    <td>R$ {{$produto->preco}}</td>
                    <td>{{$produto->categoria}}</td>
                    <td>{{$produto->estoque}}</td>
                    <td><a class="btn btn-light" style="color:#424242" href="{{url('produto-edit', ['id' => $produto->id])}}"><i class="fas fa-spell-check"></i></a></td>  
                    <td><a class="btn btn-light" style="color:#424242" href="{{url('produto_delete', ['id' => $produto->id])}}"><i class="fas fa-trash"></i></a></td>  
                  </tr>
                  @endforeach
                </table>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

                 

  <section>

      <!-- Modal -->
    <div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <form id="formcategoria" method="POST">
          
          <div class="modal-body">
          
            <input type="text" id="categoria_cad" name="categoria" class="form-control">

            <input type="hidden" name="cliente_id">
          
          </div>
          
          <div class="modal-footer">
            <a href="{{url('/produto_cadastro')}}" class="btn btn-secondary" data-dismiss="modal">Fechar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
          
          </form>


        </div>
      </div>
    </div>

                  
      <div class="modal fade" id="modal-produtos">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              @if(!isset($_produtos))
              <h4 class="modal-title">Novo produto</h4>
              @else
              <h4 class="modal-title">Editar produto</h4>
              @endif
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="col-md-12">    
              @if(!isset($_produtos))   
              @php 
                $titulo = "";
                $descricao = "";
                $preco = "";
                $valor = "";
                $categoria ="";   
                $estoque = "";       
              @endphp                         
              <form class="form-horizontal" method="POST" action="{{url('/produto_cad')}}">
              @else           
              @php 
                $titulo = $_produtos->titulo;                
                $valor = $_produtos->valor;
                $descricao = $_produtos->descricao;
                $preco = $_produtos->preco;   
                $categoria = $_produtos->categoria;       
                $estoque = $_produtos->estoque;  
              @endphp
              <form class="form-horizontal" method="POST" action="{{url('/produto_atual')}}">             
              @endif
               {{csrf_field()}}
                <div class="card-body">                  
                  @if(isset($_produtos))
                  <input type="hidden" name="id" value="{{$_produtos->id}}">
                  @endif                    
                  <input type="hidden" name="cliente_id" value="{{$logado}}">  
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{$titulo}}" class="form-control" name="titulo" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                    <textarea name="descricao" class="form-control">{{$descricao}}</textarea>    
                </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Valor</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{$valor}}" class="form-control" name="valor" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Preço</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{$preco}}" class="form-control" name="preco" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Categoria</label>
                    <div class="col-sm-8">
                       <select name="categoria" id="categoria_select" class="form-control">
                          @foreach($categorias as $categoria)
                            @if(isset($_produtos->categoria))
                              @if($categoria->categoria == $_produtos->categoria)
                              <option selected>{{$categoria->categoria}}</option>
                              @else
                              <option>{{$categoria->categoria}}</option>
                              @endif
                            @else
                            <option>{{$categoria->categoria}}</option>
                            @endif                                             
                          @endforeach                       
                        </select>
                    </div>
                    <div class="col-sm-1">
                      <a href="#" id="add_categoria" style="margin-left:0px;" class="btn btn-light"><i class="fas fa-plus"></i></a>  
                    </div>
                  </div>
                
                 <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Fornec</label>
                    <div class="col-sm-10">
                    <select name="fornecedor" class="form-control">
                          <option value="">Nenhum</option>                          
                       </select>
                    </div>
                 </div> 

                 <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Estoque</label>
                    <div class="col-sm-10">
                      <input type="text" name="estoque" value="{{$estoque}}" id="estoque" class="form-control">
                    </div>
                 </div> 
                
            </div>
           </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-success">Salvar produto</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script>

(function ($) {

  $('#add_categoria').click(function(){

  $('#modal-produtos').modal("hide");

  $('#modalCategoria').modal("show");

  $('#categoria_cad').val("");

  });

  $('#formcategoria').submit(function(e){

  e.preventDefault();  

  var categoria = $('#categoria_cad').val();

  $('#categoria_select').append('<option>'+categoria+'</option>');
  
  $('#modalCategoria').modal("hide");
  
  $('#modal-produtos').modal("show");

  });


})(jQuery)



</script>


<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.tiny.cloud/1/2m62fy6u7yerp9hnh8e5dhvnj5tqrd6ihvf4wgwnixfve7fh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@if(isset($_produtos))
  <script>
      $(function(){
         $('#modal-produtos').modal("show");   
      });
  </script>
@endif

<script type="text/javascript">

$(document).ready(function () {

$('.product_desc').hide();
$('.produtct_title').click(function(e){
e.preventDefault();  
$('.product_desc').slideToggle();
});

  /* tinymce.init({
      selector: '#mytextarea'
    }); */
  $('#buttonfile').click(function(){
  $('#file')[0].click();  
  });

  $('#file').change(function(e){
 
  var fileList = e.target.files;

  var name =  fileList[0].name;

  $('#namefile').text(name);

  });
 
  $('#add_produto_button').click(function(){

  $('#modal-produtos').modal("show");

  });

  $('#envia_email_button').click(function(){

  //window.open("{{route('produtos.pdf')}}");

  $('#modalEmail').modal("show");
  
  });

  $('#imprimir_button').click(function(){

    $.ajax({
       url:"{{url('/Produtoprint')}}",
       method:'POST',
       data:{
        _token:"{{csrf_token()}}"  
       },
       success:function(response){
       
       if(response > 0){ 
        
       window.open("{{url('/Printprodutos')}}", '_blank');
      
       }else{

       alert('Não há produtos');
      
       } 
       },error:function(error){
       
       console.log(error); 
       
      }

    });
  });

  $('#exportar_button').click(function(){

  window.open("{{route('produtos.pdf')}}");

  });

  bsCustomFileInput.init();
      
    $("#example1").DataTable({
      "responsive": true,
      "ordering":false,
      "autoWidth": false,
      "lengthMenu": [[5, 10, 25 , 50 -1], [5 , 10, 25, 50, "All"]]
    });
    $("#table").DataTable({
      "responsive": true,
      "ordering":false,
      "autoWidth": false,
      "lengthMenu": [[10, 25 , 50 -1], [10, 25, 50, "All"]]
    });
 });
</script>
</body>
</html>
