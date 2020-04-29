<div class="container-fluid">
    <div class="row">
        <h4 class="text-center text-danger"><strong>FORMATO DE SOLICITUD PARA MAESTRIA</strong></h4>
        <div class="container">
            <div class="col-md-3">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            @foreach ($futmaestria as $futma)
                            <a href='{{asset('documentos/'.$futma->descripcion)}}'><img src="{{ asset('img/word.png') }}" alt="" width="150px"></a>
                            <h4>adsadjaslkdjlska</h4>
                            @endforeach
                            </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="text-primary"><strong>Word</strong></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                                @foreach ($futmaestria as $futma)
                        <a href='{{asset('documentos/'.$futma->link)}}' target="_blank"><img src="{{ asset('/img/pdf.png') }}" alt="" width="150px"></a>
                                @endforeach
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="text-danger "><strong>Pdf</strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <h4 class="text-center text-danger"><strong>FORMATO DE SOLICITUD PARA DOCTORADO</strong></h4>
        <div class="container">
            <div class="col-md-3">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                                @foreach ($futdoctorado as $futdo)
                                <a href='{{asset('documentos/'.$futdo->descripcion)}}'><img src="{{ asset('img/word.png') }}" alt="" width="150px"></a>
                                @endforeach
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="text-primary"><strong>Word</strong></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                                @foreach ($futdoctorado as $futdo)
                                <a href='{{asset('documentos/'.$futdo->link)}}' target="_blank"><img src="{{ asset('img/pdf.png') }}" alt="" width="150px"></a>
                                        @endforeach
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="text-danger "><strong>Pdf</strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
