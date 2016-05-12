<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
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
            <li><a href="#"><i class="fa fa-medkit"></i> <span>Consulta Médica</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
