<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>USUÁRIO</title>
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
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu --> 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('includes/menu');
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Usuário</h1>       
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Info</a></li>
              <li class="breadcrumb-item active">usuário</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->

    <br>

    <!-- Fim categorias - inicio section produtos -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-success card-outline">
              <div class="card-body box-profile">
                
              <form action="{{url('/Upduser')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="text-left">

                @if($user->img && $user->img!="")

                <img class="profile-user-img img-fluid img-circle"
                       src="images/{{$user->img}}"
                       alt="{{$user->img}}">

             
                @else 
                 
                <img class="profile-user-img img-fluid img-circle"
                       src="images/user.jpg"
                       alt="User image">
                                  
                 @endif 
                 
                    </div>
                 <br>
                <label for="">Inserir foto</label> <br>
                <input type="file" name="file">
                <br><br>
                <input type="text" name="id" value="{{$user->id}}" hidden>
                <label for="">Nome</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                <br>
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{$user->email}}">
                <br>
                <label for="">Telefone</label>
                <input type="text" class="form-control" name="telefone" value="{{$user->telefone}}">
                <br>
                <label for="">Rua</label>
                <input type="text" class="form-control" name="rua" value="{{$user->telefone}}">
                <br>
                <label for="">Número</label>
                <input type="text" class="form-control" name="numero" value="{{$user->numero}}">
                <br>
                <label for="">Bairro</label>
                <input type="text" class="form-control" name="bairro" value="{{$user->bairro}}">
                <br>
                <label for="">Cidade</label>
                <input type="text" class="form-control" name="cidade" value="{{$user->cidade}}">
                <br>
                <br>
                <input type="submit" value="Atualizar" class="btn btn-success btn-block">
              
                </form>

            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
     
            <!-- /.card -->
          </div>
          <!-- /.col -->
   
          <!-- /.col -->
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
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.tiny.cloud/1/2m62fy6u7yerp9hnh8e5dhvnj5tqrd6ihvf4wgwnixfve7fh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>






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
 



 });
</script>
</body>
</html>
