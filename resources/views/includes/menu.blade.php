  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('images/mylogo.png')}}" width="50"  alt="AdminLTE Logo" 
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size:15px;font-weight:bold;">CASS EMPREENDIMENTOS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="images/{{Auth::user()->img}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/User')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <!--       <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item">
            <a  href="{{url('/')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Vendas
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clientes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{url('/clientes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Meus clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/cliente_cadastro')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar cliente</p>
                </a>
              </li>       
           </ul>
          </li>          
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Produtos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{url('/produto_cadastro')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar produto</p>
                </a>
              </li>       
           </ul>
          </li>
         
          </li>


 
    <!--       <li class="nav-item">
            <a href="{{url('/vendas')}}" class="nav-link">
              <i class="nav-icon fas fa-comment-dollar"></i>
              <p>
                Vendas                
              </p>
            </a>
          </li> -->
    
       <!--    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Financeiro
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{url('/vendas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendas</p>
                </a>
              </li>          
              <li class="nav-item">
                <a href="{{url('/venda')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Efetuar venda</p>
                </a>
              </li>       
           </ul>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  