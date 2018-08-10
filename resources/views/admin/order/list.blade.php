<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>List Order</h2>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <th class="col-md-1"></th>
                            <th class="col-md-4">Client</th>
                            <th class="col-md-4">Total</th>
                            <th class="col-md-3">Action</th>
                        </thead>
                        <tbody>
                        @foreach($list_obj as $item)
                            <tr class="row" id="row-item-{{$item->id}}">
                                <td class="col-md-1 text-center">
                                    <input type="checkbox" class="check-item">
                                </td>
                                <td class="col-md-1">{{$item->id}}</td>
                                <td class="col-md-4">{{$item->clientId}}</td>
                                <td class="col-md-4">{{$item->total}}</td>
                                <td class="col-md-3">
                                    <a href="#" class="btn btn-link btn-quick-edit">Quick Edit</a>&nbsp;&nbsp;
                                    <a href="/admin/bakery/edit/{{$item -> id}}" class="btn btn-link btn-edit">Edit</a>&nbsp;&nbsp;
                                    <a href="#" id="{{$item-> id}}" class="btn btn-link btn-delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8 form-inline">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="check-all">
                        <label class="form-check-label" for="defaultCheck1">Check All</label>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <span>Delete All</span>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" id="btn-apply">Submit</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>