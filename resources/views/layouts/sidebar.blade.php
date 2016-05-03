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
            <li class="header">SECCIONES</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="#"><i class="fa fa-hospital-o"></i> <span>ABCD</span></a></li>
            <li><a href="/paciente"><i class="fa fa-users"></i> <span>Pacientes</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-user-md"></i> <span>WXYZ</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Administradores</a></li>
                    <li><a href="#">Doctores</a></li>
                    <li><a href="#">Enfermeras</a></li>
                </ul>
            </li>

            <!-- Only the authorized users will see this! -->
            <li class="header">PROCESOS</li>
            <li><a href="/paciente/create"><i class="fa fa-book"></i> <span>Apertura de Historia Clínica</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
