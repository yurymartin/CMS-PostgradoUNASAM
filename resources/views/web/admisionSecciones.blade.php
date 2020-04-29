<div class="panel-group">
  <div class="panel panel-default" id="tabla2">
    <div class="panel-heading-admision-Cronograma">
      <h4 class="text-center" >
        <span class="glyphicon glyphicon-th-list"></span> CRONOGRAMA DE ACTIVIDADES 2019
      </h4>
    </div>
    <div class="panel-title">
      <div class="panel-body panel-body-admision-question">
        <div class="col-md-12 wow fadeInDown">
          <div class="tab-wrap">
            <div class="media cronograma">
              <div class="parrent">
                <table class="table table-striped" border="1" cellspacing="0" cellpadding="0" width="597">
                  <tr>
                    <th width="370">
                      <p><strong>ACTIVIDADES</strong></p>
                    </th>
                    <th width="227">
                      <p><strong>FECHAS 2019</strong></p>
                    </th>
                  </tr>
                  @foreach ($actividades as $row)
                  <td width='370' valign='top'>{{$row->actividad}}</td>
                  <td width='227'>
                    <p>{{$row->actividad}}</p>
                  </td>
                </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
          <!--/.media-->
        </div>
        <!--/.tab-wrap-->
      </div>
      <!--/.col-sm-6-->
    </div>
  </div>
</div>