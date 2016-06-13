<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <select id="searchbox" name="q" placeholder="Search..." class="form-control"></select>
            </div>
        </form> -->

        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">ADMINISTRACIÓN</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- <li><a href="#"><i class="fa fa-hospital-o"></i> <span>ABCD</span></a></li> -->
            <li><a href="/usuario"><i class="fa fa-user-md"></i> <span>Usuarios</span></a></li>
            <li><a href="/paciente"><i class="fa fa-users"></i> <span>Pacientes</span></a></li>

            <!-- Only the authorized users will see this! -->
            <li class="header">PROCESOS</li>
            @can('create_patient')
                <li><a href="/paciente/create"><i class="fa fa-book"></i> <span>Apertura de Historia Clínica</span></a></li>
            @endcan
            <!-- <li><a href="#"><i class="fa fa-medkit"></i> <span>Consulta Médica</span></a></li> -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-medkit"></i> <span>Consulta Médica</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    <li>
                        <form class="sidebar-form" role="search" style="height: 300px">
                            <div class="form-group" style="width: 240px;">
                                <select id="searchbox" name="q" placeholder="Buscar paciente..." class="form-control"></select>
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
<!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
