<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VENDAS</title>
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

<style>

.radio-item {
  display: inline-block;
  position: relative;
  padding: 0 6px;
  margin: 10px 0 0;
}

.radio-item input[type='radio'] {
  display: none;
}

.radio-item label {
font-weight: normal;
}

.radio-item label:before {
  content: " ";
  display: inline-block;
  position: relative;
  top: 5px;
  margin: 0 5px 0 0;
  width: 20px;
  height: 20px;
  border-radius: 11px;
  border: 2px solid #ccc;
  background-color: transparent;
}

.radio-item input[type=radio]:checked + label:after {
  border-radius: 11px;
  width: 12px;
  height: 12px;
  position: absolute;
  top: 9px;
  left: 10px;
  content: " ";
  display: block;
  background: #dc3545;
}

</style>

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
              <h1>Vendas realizadas</h1>
       
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Vendas</a></li>
              <li class="breadcrumb-item active">vendas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section  class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12"> 
          @if(isset($pr) || isset($d) || isset($atual) 
          || isset($categoriaatual) 
          || session()->has('success')
          || session()->has('successmail'))
             <div class="card card-success">
                <div class="card-header">
                  @if(isset($pr))
                  Venda cadastrado com sucesso
                  @endif
                  @if(isset($d))
                  Categoria cadastrada com sucesso
                  @endif
                  @if(isset($atual))
                  Venda atualizado com sucesso
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
      @if(isset($boletoURL))
        <script>
          window.open("{{$boletoURL}}","blank","top=200,left=400,width=700,height=400");                  
        </script>        
      @endif  
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
              <button id="add_produto_button" class="btn btn-success"> <i class="fas fa-comment-dollar"></i> Nova venda </button>
               </div>
           <!--    {{$vendas}}    --> 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Item</th>    
                    <th>Quantidade</th>  
                    <th>Cliente</th>     
                    <th>Valor uni</th>    
                    <th>Valor total</th> 
                    <th>Tipo</th> 
                    <th>Status</th>    
                    <th>Data venda</th> 
                   </tr>
                  </thead>
                  <tbody>
                  @foreach($vendas as $venda)              
                  <tr>
                    <td>
                      <a style="color:#000;text-decoration:underline" href="#">{{$venda->titulo}}</a> 
                      @php 
                       $data_cr = date("d-m-Y H:i:s",strtotime($venda->created_at));
                       $data_up = date("d-m-Y H:i:s",strtotime($venda->updated_at));
                       $valor = $venda->valorvenda;
                       $valoruni = str_replace(',','.',$valor);
                       $valortotal = number_format($venda->quantidade * $valoruni,2,',','.');
                      @endphp
                     <!--  <span> <br>{{$venda->descricao}}<br></span> -->
                    </td> 
                    <td>{{$venda->quantidade}}</td>
                    <td>{{$venda->nome}}</td>
                    <td>{{$valor}}</td>
                    <td>{{$valortotal}}</td>                    
                    <td>{{$venda->tipo_pg}}</td>
                    <td>{{$venda->status}}</td>
                    <td>{{$data_cr}}</td>
                  </tr>
                  @endforeach
                </table>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
   <section>
   <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="modal-produtos" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Nova venda</h4>           
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
       <div class="container">           
      <div class="form-group row">   
        <br>          
        <div class="col-md-5">
        </div>
      </div>
      <input type="hidden" id="idcliente">
      <div class="row">
          <div class="col-md-5">
          <div>
          <input type="text" style="height:48px" class="form-control col-md-11" name="titulo" id="src" name="src" placeholder="Digite o nome do produto">
          <span style="padding:5px;padding-top:10px;float:right;margin-top:-50px;" ><i class="fa fa-search"></i></span>  
          </div>
          <br>
          <table class="table tableprodutos">
              <thead class="thead-dark">
                  <tr>
                  <th scope="col">Código</th>
                  <th scope="col">Produto</th>
                  <th scope="col">Preço</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Add</th>
                  </tr>
              </thead>
              <tbody id="tbodyprodutos">
              </tbody>
            </table>
          </div>          
          <div class="col-md-6">
          <table class="table">
              <thead>
                  <tr>
                    <th id="th-itens" style="cursor:pointer" class="bg-secondary" scope="col">Itens</th>
                    <th id="th-pg" style="cursor:pointer" class="bg-danger" scope="col">Pagamento</th>
                  </tr>
              </thead>
              <tbody id="tbodyprodutosvenda">
              </tbody>
            </table>
            <div class="pagamento">
            <div class="card">
                <div class="card-header">Pagamento</div>
                <div class="card-body">
                  <h5 class="card-title"><strong>Pagar:</strong></h5><br>
                  <div class="radio-item">
                    <input type="radio" id="op-vista" name="ritem" value="ropt1">
                    <label style="font-weight:normal" for="op-vista">Dinheiro</label>
                  </div><br>
                  <div class="radio-item">
                      <input type="radio" id="op-boleto" name="ritem" value="ropt2">
                      <label style="font-weight:normal" for="op-boleto">Boleto</label>
                  </div><br>
                  <div class="radio-item">
                      <input type="radio" id="op-credito" name="ritem" value="ropt3">
                      <label style="font-weight:normal" for="op-credito">Cartão de crédito</label>
                  </div><br>
                  <div class="radio-item">
                      <input type="radio" id="op-debito" name="ritem" value="ropt4">
                      <label style="font-weight:normal" for="op-debito">Cartão de débito</label>
                  </div>
                </div>
            </div>     
            </div>
            <p style="float:right;margin-right:20px;font-size:35px;" class="text-danger" id="total"></p>
            <br><br>
            <input hidden name="option" id="option">
            <br>
          </div>         
        </div>
        <div class="row">
            <div class="col-md-9">
            <div class="card cliente">
              <div class="card-header">
                <button id="novocliente" class="btn btn-light"> <i class="fas fa-plus"></i> Novo cliente </button>
                <button id="editcliente" class="btn btn-light"> <i class="fas fa-edit"></i> Editar cliente </button>
              </div>
              <div class="card-body">
                  <select class="form-control" id="select_cliente">
                      <option value="">Selecione um cliente</option>
                  </select>
              </div>    
            </div>
            <div class="card boleto">
              <h5 class="card-header">Boleto</h5>
              <div class="card-body">
              <h4 class="total_a_receber" style="float:right"></h4>  
                    <form  id="form-boleto" action="{{url('/venda-checkout')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" id="cliente-id-boleto" name="id_cliente">
                    <input type="hidden" id="dados-boleto" name="dados">
                    <label for="">Nome</label>
                    <input type="text" name="nome"  class="form-control" id="nome">
                    <br>
                    <label for="">Identidade</label>
                    <input type="text" name="identidade"  class="form-control" id="identidade">
                    <br>
                    <label for="">CPF</label>
                    <input type="text" name="cpf"  class="form-control" id="cpf">
                    <br>
                    <label for="">CEP</label>
                    <input type="text" name="cep" class="form-control" id="cep">
                    <br>
                    <label for="">Estado</label>
                    <input type="text" name="estado"  class="form-control" id="estado">
                    <br>
                    <label for="">Cidade</label>
                    <input type="text" name="cidade" class="form-control" id="cidade">
                    <br>
                    <label for="">Bairro</label>
                    <input type="text" name="bairro" class="form-control" id="bairro">
                    <br>
                    <label for="">Rua</label>
                    <input type="text" name="rua" class="form-control" id="rua">
                    <br>
                    <label for="">Número</label>
                    <input type="text" name="numero" class="form-control" id="numero">
                    <br>
                    <label for="">Vencimento</label>
                    <input type="date" name="data_pg" class="form-control">
                    <br>
                    <input type="hidden" name="dados" id="dados2">
                    <input hidden id="totalinput" name="total">
                    <button id="submit_boleto" style="float:right" class="btn btn-success"> <i class="fas fa-file"></i> Gerar boleto </button>                     
                    <a class="btn btn-secondary" href="{{url('/vendas') }}">Cancelar</a>
                  </form>
              </div>
             </div>
            <div class="card cartao-credito">
            <h5 class="card-header">Crédito</h5>
            <div class="card-body">
                <h4 class="total_a_receber" style="float:right"></h4>  
                <form id="form-credito" action="{{url('/venda')}}" method="POST">
                    {{csrf_field()}}
                    <br>
                    <input type="hidden" id="cliente-id-credito" name="id_cliente">
                    <input type="hidden" id="dados-credito" name="dados">
                    @php 
                    $date = date('Y-m-d');  
                    @endphp 
                    <label for="">Tipo de recebimento</label> 
                    <input type="text" name="tipo_pg" value="Cartão de crédito" class="form-control">
                    <br>                            
                    <label>Selecione as parcelas</label>
                    <select name="parcelas" class="form-control" id="parcelas">
                    </select>    
                    <br>                 
                    <label for="">Data do recebimento</label> 
                    <input type="date" name="data_venc" value="{{$date}}" class="form-control">
                    <br>
                    <button id="submit_credito" style="float:right" class="btn btn-success"> <i class="fas fa-check"></i> Prosseguir </button>                    
                    <a class="btn btn-secondary" href="{{url('/vendas') }}">Cancelar</a>
                  </form>
                </div>
            </div>
            <div class="card cartao-debito">
            <h5 class="card-header">Débito</h5>
            <div class="card-body">
            <h4 class="total_a_receber" style="float:right"></h4>  
            <form id="form-debito" action="{{url('/venda')}}" method="POST">
            {{csrf_field()}}
            <br>
            @php 
            $date = date('Y-m-d');  
            @endphp
            <label for="">Tipo de recebimento</label> 
            <input type="hidden" id="cliente-id-debito" name="id_cliente">
            <input type="hidden" id="dados-debito" name="dados">
            <input type="text" name="tipo_pg" value="Cartão de débito" class="form-control">
            <br>
            <label for="">Data do recebimento</label> 
            <input type="date" name="data_venc" value="{{$date}}" class="form-control">
            <br>
            <button id="submit_debito" style="float:right" class="btn btn-success"> <i class="fas fa-check"></i> Prosseguir </button> 
            <a class="btn btn-secondary" href="{{url('/vendas') }}">Cancelar</a>                   
            </form>
            </div>
            </div>
              <div class="card vista">
                <h5 class="card-header">Dinheiro</h5>
                <div class="card-body">
                <h4 class="total_a_receber" style="float:right"></h4>  
                <form id="form-dinheiro" action="{{url('/venda')}}" method="POST">
                    {{csrf_field()}}
                    <br>
                    @php 
                    $date = date('Y-m-d');  
                    @endphp           
                    <br> 
                    <label for="">Tipo de recebimento</label> 
                    <input type="text" name="tipo_pg" value="Dinheiro a vista" class="form-control">
                    <br>
                    <label for="">Data do recebimento</label> 
                    <input type="date" name="data_pg" value="{{$date}}" class="form-control">
                    <input type="hidden" name="dados" id="dados">
                    <input type="hidden" name="id_cliente" id="cliente-id-money">                    
                    <br>
                    <button id="submit_dinheiro" style="float:right" class="btn btn-success"> <i class="fas fa-check"></i> Prosseguir </button>                    
                    <a class="btn btn-secondary" href="{{url('/vendas') }}">Cancelar</a>
                  </form>
                </div>
              </div>    
            </div>      
        </div>
      </div>
    </div>
  </div>
</div>

</section>       

<section>
  <!-- Modal -->
  <div class="modal fade" id="modalnovocliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titulo_cadastrar_cliente">Cadastrar cliente</h5>
          <h5 class="modal-title" id="titulo_editar_cliente">Editar cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <select class="form-control" id="select_cliente2">
                <option value="">Selecione um cliente</option>
            </select>
          </div>
          <form id="form-cliente" method="POST" action="#">
            <input type="hidden" id="edit" value="0"> 
            <input type="hidden" name="id-cliente-id" id="id-cliente-id">
            <div class="form-group">
             <label for="">Nome</label>
             <input type="text" name="nome" class="form-control" id="nome-cliente">   
            </div> 
            <div class="form-group">
             <label for="">Email</label>
             <input type="text" name="email" class="form-control" id="email-cliente">   
            </div> 
            <div class="form-group">
             <label for="">Telefone</label>
             <input type="text" name="telefone" class="form-control" id="telefone-cliente">   
            </div>    
            <div class="form-group">
             <label for="">CPF</label>
             <input type="text" name="cpf" class="form-control" id="cpf-cliente">   
            </div> 
            <div class="form-group">
             <label for="">Identidade</label>
             <input type="text" name="identidade" class="form-control" id="identidade-cliente">   
            </div> 
            <div class="form-group">
             <label for="">Estado</label>
             <input type="text" name="estado" class="form-control" id="estado-cliente">   
            </div> 
            <div class="form-group">
             <label for="">Cidade</label>
             <input type="text" name="cidade" class="form-control" id="cidade-cliente">   
            </div> 
            <div class="form-group">
             <label for="">Bairro</label>
             <input type="text" name="bairro" class="form-control" id="bairro-cliente">   
            </div>
            <div class="form-group">
             <label for="">Rua</label>
             <input type="text" name="rua" class="form-control" id="rua-cliente">   
            </div>
            <div class="form-group">
             <label for="">Número</label>
             <input type="text" name="numero" class="form-control" id="numero-cliente">   
            </div>
            <div class="form-group">
             <label for="">Cep</label>
             <input type="text" name="cep" class="form-control" id="cep-cliente">   
            </div>
            <div class="form-group">
             <label for="">Complemento</label>
             <input type="text" name="complemento" class="form-control" id="complemento-cliente">   
            </div>  
            <div class="form-group">
             <label for="">Data de nascimento</label>
             <input type="date" name="data_nascimento-cliente" class="form-control" id="datanasc-cliente">   
            </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar cliente</button>
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
  $('#titulo_editar_cliente').hide();
  $('#titulo_cadastrar_cliente').show();
  $('#select_cliente2').hide(); 
  function formatadata(){
    var data = new Date(),
    dia  = data.getDate().toString().padStart(2, '0'),
    mes  = (data.getMonth()+1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
    ano  = data.getFullYear();
    return ano+"-"+mes+"-"+dia;
  }

  function buscaclientes(){
    $.ajax({
       url:'{{url("/buscacliente")}}', 
       method:'POST',
       dataType:'json',
       data:{
         _token:"{{csrf_token()}}"      
       },
      success:function(response){

     _response = response;  
      
      if(response.length > 0){
        $('#select_cliente2').html("<option>Selecione um cliente</option>");
        response.map((value,i)=>{     
        $('#select_cliente2').append('<option value='+value.id+'>'+value.nome+'</option>'); 
        });
       }
      },
      error:function(error){

      } 
  
  });  
  }

  
  var _response =  "";

  var obj = null;

  var array_obj = [];

  var id_cliente;

  $('#editcliente').click(function(){
        $('#edit').val("1");
        $('#select_cliente2').show();
        buscaclientes();
        $('#modalnovocliente').modal("show");  
        $('#titulo_editar_cliente').show();
        $('#titulo_cadastrar_cliente').hide();        
        $('#nome-cliente').val("");        
        $('#email-cliente').val("");
        $('#cpf-cliente').val("");        
        $('#rua-cliente').val("");        
        $('#bairro-cliente').val("");        
        $('#cidade-cliente').val("");
        $('#estado-cliente').val("");        
        $('#complemento-cliente').val("");           
        $('#telefone-cliente').val("");
        $('#cpf-cliente').val("");
        $('#identidade-cliente').val("");
        $('#datanasc-cliente').val("");      
        $('#cep-cliente').val("");  
        $('#numero-cliente').val("");  

       
  });

  $('#form-cliente').submit(function(){

  var edit = $('#edit').val();  
 
  if(edit == 0){

    $.ajax({
      url:'{{url("/novocliente")}}',
      type:'POST',
      dataType:'json',
      data:{
        _token:"{{csrf_token()}}",
        nome:$('#nome-cliente').val(),        
        email:$('#email-cliente').val(),
        cpf:$('#cpf-cliente').val(),        
        logradouro:$('#rua-cliente').val(),        
        bairro:$('#bairro-cliente').val(),        
        cidade:$('#cidade-cliente').val(),
        estado:$('#estado-cliente').val(),        
        complemento:$('#complemento-cliente').val(),           
        telefone:$('#telefone-cliente').val(),
        cpf:$('#cpf-cliente').val(),
        identidade:$('#identidade-cliente').val(),
        cep:$('#cep-cliente').val(),
        numero:$('#numero-cliente').val(),    
        data_nascimento:$('#datanasc-cliente').val()              
      },
      success:function(response){

      if(response.length > 0){
      
      $('#select_cliente').html("<option>Selecione um cliente</option>");
        response.map((value,i)=>{     
          $('#select_cliente').append('<option value='+value.id+'>'+value.nome+'</option>');          
        });
      $('#modalnovocliente').modal("hide");
      $('#select_cliente').focus();
      }
      },
      error:function(err){
      if(err.status == 500){
      alert("Houve um erro cadastrar cliente");  
      }else{
      alert("Email já cadastrado no sistema");   
      }
     }    
    });  

  }else{
  
    $.ajax({
      url:'{{url("/novoatualcliente")}}',
      type:'POST',
      dataType:'json',
      data:{
        _token:"{{csrf_token()}}",
        id:$('#id-cliente-id').val(),
        nome:$('#nome-cliente').val(),        
        email:$('#email-cliente').val(),
        cpf:$('#cpf-cliente').val(),        
        logradouro:$('#rua-cliente').val(),        
        bairro:$('#bairro-cliente').val(),        
        cidade:$('#cidade-cliente').val(),
        estado:$('#estado-cliente').val(),    
        numero:$('#numero-cliente').val(),    
        complemento:$('#complemento-cliente').val(),           
        telefone:$('#telefone-cliente').val(),
        cpf:$('#cpf-cliente').val(),
        identidade:$('#identidade-cliente').val(),
        cep:$('#cep-cliente').val(),
        data_nascimento:$('#datanasc-cliente').val()              
      },
      success:function(resp){ 
      _response = resp;  
      $('#select_cliente').html("<option>Selecione um cliente</option>");
        resp.map((value,i)=>{     
          $('#select_cliente').append('<option value='+value.id+'>'+value.nome+'</option>');          
        });
      $('#modalnovocliente').modal("hide");
      $('#select_cliente').focus();
      alert("Selecione o cliente");
      },
      error:function(er){
      console.log(er);  
      }
  
  });
  
  }

  return false;
  
  }); 

  

  $('#novocliente').click(function(){
    $('#modalnovocliente').modal("show");
    $('#edit').val("0");
    $('#select_cliente2').hide();
    $('#titulo_editar_cliente').show();
    $('#titulo_cadastrar_cliente').hide();        
    $('#nome-cliente').val("");        
    $('#email-cliente').val("");
    $('#cpf-cliente').val("");        
    $('#rua-cliente').val("");        
    $('#bairro-cliente').val("");        
    $('#cidade-cliente').val("");
    $('#estado-cliente').val("");        
    $('#complemento-cliente').val("");           
    $('#telefone-cliente').val("");
    $('#cpf-cliente').val("");
    $('#identidade-cliente').val("");
    $('#datanasc-cliente').val("");  
    $('#cep-cliente').val("");  
    $('#numero-cliente').val("");  
  });

  $.ajax({
       url:'{{url("/buscacliente")}}', 
       method:'POST',
       dataType:'json',
       data:{
         _token:"{{csrf_token()}}"      
       },
      success:function(response){

     _response = response;  
      
      if(response.length > 0){

        response.map((value,i)=>{     
          $('#select_cliente').append('<option value='+value.id+'>'+value.nome+'</option>'); 
          $('#select_cliente2').append('<option value='+value.id+'>'+value.nome+'</option>');       
        });
       }
      },
      error:function(error){

      } 
  
  });

  $('#select_cliente').change(function(){

  id_cliente = $(this).val();

  for(var i = 0; i < _response.length;i++){
    
    if(_response[i].id == id_cliente){

    console.log(_response[i]);  

    $('#nome').val(_response[i].nome);  

    $('#bairro').val(_response[i].bairro);

    $('#cidade').val(_response[i].cidade);

    $('#estado').val(_response[i].estado);
    
    $('#cep').val(_response[i].cep);

    $('#identidade').val(_response[i].identidade);

    $('#cpf').val(_response[i].cpf);

    $('#rua').val(_response[i].logradouro);
    
    $('#numero').val(_response[i].numero);
  
    break;

    }
  }
  
  });


$('#select_cliente2').change(function(){

var _cliente = $(this).val();

for(var i = 0; i < _response.length;i++){
  
  if(_response[i].id == _cliente){

  console.log(_response[i]);  

  $('#id-cliente-id').val(_cliente);  

  $('#nome-cliente').val(_response[i].nome);  

  $('#bairro-cliente').val(_response[i].bairro);

  $('#cidade-cliente').val(_response[i].cidade);

  $('#estado-cliente').val(_response[i].estado);
  
  $('#cep-cliente').val(_response[i].cep);

  $('#identidade-cliente').val(_response[i].identidade);

  $('#cpf-cliente').val(_response[i].cpf);

  $('#rua-cliente').val(_response[i].logradouro);
  
  $('#numero-cliente').val(_response[i].numero);

  $('#datanasc-cliente').val(formatadata(_response[i].data_nascimento));

  $('#email-cliente').val(_response[i].email);

  $('#telefone-cliente').val(_response[i].telefone);
  
  $('#complemento-cliente').val(_response[i].complemento);

  break;

  }
}

});



$('.pagamento').hide();
$('.cliente').hide();
$('#op-vista').attr("checked","true");
$('.vista').hide();
$('.cartao-credito').hide();
$('.cartao-debito').hide();
$('.boleto').hide();
$('#src').val("");

var total = 0;

$('#op-vista').change(function(){
$('#option').val("vista");
$('.vista').show();
$('.cartao-credito').hide();
$('.cartao-debito').hide();
$('.boleto').hide();
$('.tableprodutos').hide();
$('#src').val("");

});

$('#op-boleto').change(function(){
$('#option').val("boleto");
$('.vista').hide();
$('.cartao-credito').hide();
$('.cartao-debito').hide();
$('.boleto').show();
$('.tableprodutos').hide();
$('#src').val("");

});

$('#op-credito').change(function(){
$('#option').val("credito");
$('.vista').hide();
$('.cartao-credito').show();
$('.cartao-debito').hide();
$('.boleto').hide();
$('.tableprodutos').hide();
$('#src').val("");

$('#parcelas').html('<option>Selecione abaixo</option>');

for(var i = 1; i <= 12; i++){

var parcelas =  total/i;  

parcelas = parcelas.toFixed(2).replace('.',',');

var novototal =  total/i; 

novototal = novototal.toFixed(2);

$('#parcelas').append('<option>'+i+'x de R$ '+parcelas+'</option>');
 
}

});


$('#op-debito').change(function(){
$('#option').val("debito");
$('.vista').hide();
$('.cartao-credito').hide();
$('.cartao-debito').show();
$('.boleto').hide();
$('.tableprodutos').hide();
$('#src').val("");

});

$('#src').keyup(function()  {
var texto = $(this).val();
var tam = 0;
    $.ajax({
       url:'{{url("/busca2")}}', 
       method:'POST',
       dataType:'json',
       data:{
         _token:"{{csrf_token()}}",
         product:texto  
       },
       success:function(response){
       
       tam = response.length; 
       
       if(response.length > 0){

       $('#tbodyprodutos').html(""); 

       response.map((value,i)=>{
        
       $('#tbodyprodutos')
        //.append('<tr><th scope="row">'+value.id+'</th><td>'+value.titulo+'</td><td><form class="novo-form" method="POST"><input type="number" placeholder="Quantidade"/></td><td>'+value.preco+'</td><td><input name="values" value='+value+'><button  class="add-btn btn btn-outline-success"><i class="fas fa-plus"></i></button></form></td></tr>');
       .append('<tr><th scope="row">'+value.id+'</th><td>'+value.titulo+'</td><td>'+value.preco+'</td><td><form id="'+i+'" action=""> <input type="hidden" name="codigo" value='+value.id+'><input type="number" min="1" style="width:50px" name="quantidade"></form></td><td><button value="'+i+'|'+value.titulo+'|'+value.descricao+'|'+value.preco+'|'+value.id+'" class="btn-add btn btn-light"><i class="fas fa-plus"></button></td></tr>');  

       });

      
        $(".btn-add").click(function(event){
        event.preventDefault();   
        var values = $(this).val();
        values = values.split("|");
        /* console.log(values); */
        var id = values[0];
        var titulo = values[1];
        var descricao = values[2];
        var preco = values[3];
        var quantidade = 0;
        var idd = values[4];

        for(var i = 0; i < tam;i++){

        if(id == i){          
        var x = $('#'+i+'').serializeArray();
        quantidade = x[1].value;
        if(quantidade == ""){
        quantidade = 1; 
        }
        var uni = preco;
        var preco = parseFloat(preco.replace(',','.'));
        var priceuni = parseFloat(preco);
        preco = quantidade * preco;
        total+=preco;
        var visualpreco = String(preco);
        $('#tbodyprodutosvenda').append('<tr><td>'+quantidade+'</td><td>'+titulo+' '+descricao+'</td><td>'+uni+'</td><td>'+visualpreco.replace('.',',')+'</td></tr>');  
        obj = {"id":idd,"titulo":titulo,"descricao":descricao,"quantidade":quantidade,"valoruni":priceuni,"valortotal":preco};
        var visualtotal = String(total);
        array_obj.push(obj);
        $('#totalinput').val(total);
        $('.total_a_receber').text("Á receber: R$ "+visualtotal.replace('.',','));
        $('#total').text("R$ TOTAL "+visualtotal.replace('.',','));
        console.log(array_obj);
        break;
        }

        }
       

                
        });

        $('#th-pg').click(function(){
            $('#tbodyprodutosvenda').hide();
            $('.tableprodutos').hide();
            $('.pagamento').show();       
            $('.vista').show();
            $('.cliente').show();
            $('#src').val("");
        });

        $('#th-itens').click(function(){
            $('#tbodyprodutosvenda').show();
            $('.tableprodutos').hide();
            $('.pagamento').hide();
        });
      
       }
       },
       error:function(error){
       console.log(error);
       }
    });

});    

$('#form-dinheiro').submit(function(e){
if(!id_cliente){
alert("Favor selecione um cliente"); 
return false; 
}

$('#cliente-id-money').val(id_cliente);

$('#dados').val(JSON.stringify(array_obj));

});

$('#form-credito').submit(function(e){
if(!id_cliente){
alert("Favor selecione um cliente"); 
return false; 
}

$('#cliente-id-credito').val(id_cliente);

$('#dados-credito').val(JSON.stringify(array_obj));

});


$('#form-debito').submit(function(e){
if(!id_cliente){
alert("Favor selecione um cliente"); 
return false; 
}

$('#cliente-id-debito').val(id_cliente);

$('#dados-debito').val(JSON.stringify(array_obj));

});


$('#form-boleto').submit(function(){

if(!id_cliente){

alert("Favor selecione um cliente"); 

return false; 

}

$('#cliente-id-boleto').val(id_cliente);

$('#dados2').val(JSON.stringify(array_obj));

});



$('.product_desc').hide();
$('.produtct_title').click(function(e){
e.preventDefault();  
$('.product_desc').slideToggle();
});

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

  bsCustomFileInput.init();
    
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
