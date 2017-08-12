<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="/public/build/css/nptunnel.css">

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
    <script src="https://use.fontawesome.com/8a9a2553cc.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/lodash/4.17.4/lodash.min.js"></script>
    <style>
        .sortable {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .sortable span.tag {
            margin: 3px 3px 3px 0px;
            padding: 9px 9px;
            float: left;
        }

        .clearfix {
            overflow: auto;
        }

        .box {
            border: 0;
        }

        span.clear {
            clear: left;
            display: block;
        }
        .box .fieldtag {
            padding: 8px;
            margin: 4px;
            cursor: pointer;
        }

    </style>
</head>
<body>
<div class="container" id="app">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SQL Builder</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
                    <li><a href="../navbar-static-top/">Static top</a></li>
                    <li><a href="../navbar-fixed-top/">Fixed top</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    plays
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Fields
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Buscar Campos:</label>
                        <input type="text" class="form-control" id="filter" v-model="filter">
                    </div>
                    <div class="box sortable" id="fields-box">
                        <span v-for="(item, index) in fieldsFiltered" class="tag label label-success fieldtag">{{item.name}}
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <!-- selects -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Selecionados
                        </div>
                        <div class="panel-body">
                            <div class="box" id="selects-box">
                                <span class="tag label label-success fieldtag">usuario.nome
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </span>
                                <span class="tag label label-success fieldtag">usuario.email
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- filters -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filtros
                        </div>
                        <div class="panel-body">
                            <div class="box" id="filters-box">
                                <span class="tag label label-success fieldtag">usuario.nome
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </span>
                                <span class="tag label label-success fieldtag">usuario.email
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- order -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ordenação
                        </div>
                        <div class="panel-body">
                            <div class="box" id="orders-box">
                                <span class="tag label label-success fieldtag">usuario.nome
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </span>
                                <span class="tag label label-success fieldtag">usuario.email
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->

<!-- Modal -->
<div class="modal fade" id="modalAddFilter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Filtros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" id="usr">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script src="/public/build/js/nptunnel.js"></script>
<script>
    $( function() {
        $("ul.droptrue").sortable({
            connectWith: "ul",
            dropOnEmpty: false
        });

        $("#filters-box").sortable({
            connectWith: ".box",
            dropOnEmpty: false,
            update: function( event, ui ) {
                $("#modalAddFilter").modal();
            }
        });

        $("#fields-box").sortable({
            connectWith: ".box"
        });

        $("#selects-box").sortable({
            connectWith: ".box"
        });

        $("#orders-box").sortable({
            connectWith: ".box"
        });

        $("#sortable1, #sortable2, #sortable3").disableSelection();
    });

    new Vue({
        el: '#app',
        data: {
            fieldsApi: "http://localhost:8000/api.php",
            fields: {},
            filter: '',
        },
        created: function () {
            axios.get(this.fieldsApi)
                .then(response => {
                    this.fields = response.data;
            });
        },
        computed: {
            fieldsFiltered(){
                let collection = _.orderBy(this.fields, 'name', 'asc');
                return _.filter(collection, item => {
                   return item.name.indexOf(this.filter) >= 0;
                });
                return this.fields;
            }
        }
    })
</script>
</body>
</html>