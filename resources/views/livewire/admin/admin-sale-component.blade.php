<div>
    <div class="container" style="padding:30px 0 ;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sale sating
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Sale Date</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="sale-date" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-md-4"></label>
                                <div class="col-md-4">
                                   <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
   <script>
    $(function(){
        $('#sale-date').datepicker({
            format : 'yyyy/mm/dd',
        })
        .on('dp.change',function(ev){
            
        })
    })
   </script>
@endpush