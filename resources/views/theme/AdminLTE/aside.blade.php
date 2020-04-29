<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset("img/usuarios/".$usuarios->imagen) }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{$usuarios->nombres}}{{$usuarios->apellidos}}</p>
        <a href="#"><i class="text-success">{{$usuarios->tipo}}</i></a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">NAVEGACIÓN</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-group"></i><span>Consejo Directivo</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/grados"><i class="fa fa-circle-o"></i> Grados academicos</a></li>
          <li><a href="/admin/facultad"><i class="fa fa-circle-o"></i> Facultades</a></li>
          <li><a href="/admin/cargo"><i class="fa fa-circle-o"></i> Cargos</a></li>
          <li><a href="/admin/consejo"><i class="fa fa-circle-o"></i> Miembros del consejo</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-male"></i><span>Personal Administrativo</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/jerarquias"><i class="fa fa-circle-o"></i> Jerarquia</a></li>
          <li><a href="/admin/cargo"><i class="fa fa-circle-o"></i> Cargos</a></li>
          <li><a href="/admin/personal"><i class="fa fa-circle-o"></i> personal</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-graduation-cap"></i>
          <span>Maestrias</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/cat_maestria"><i class="fa fa-circle-o"></i> Facultad de las Maestrias</a></li>
          <li><a href="/admin/maestrias"><i class="fa fa-circle-o"></i> Maestrias</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-graduation-cap"></i>
          <span>Doctorados</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/doctorados"><i class="fa fa-circle-o"></i> Doctorados</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Cursos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/cursos"><i class="fa fa-circle-o"></i> Cursos</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-mortar-board"></i> <span>Docentes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/especialidades"><i class="fa fa-circle-o"></i> Especialidades</a></li>
          <li><a href="/admin/universidades"><i class="fa fa-circle-o"></i> Universidades</a></li>
          <li><a href="/admin/docentes"><i class="fa fa-circle-o"></i> Docentes</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder-open"></i> <span>Documentos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/tipo_documento"><i class="fa fa-circle-o"></i> Tipos de documentos</a></li>
          <li><a href="/admin/documentos"><i class="fa fa-circle-o"></i> documentos</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-image-o"></i> <span>Contenido web</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/tipocontenido"><i class="fa fa-circle-o"></i> Tipos de contenido web</a></li>
          <li><a href="/admin/contenido"><i class="fa fa-circle-o"></i> Contenido web</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user-plus"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/tipousuarios"><i class="fa fa-circle-o"></i> Tipo de Usuario</a></li>
          {{--<li><a href="/admin/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>--}}
          <li><a href="/admin/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-star"></i> <span>Actividades</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/actividades"><i class="fa fa-circle-o"></i> Actividad</a></li>
        </ul>
      </li>
      <li><a href="/admin"><i class="fa fa-book"></i> <span>Documentación</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>