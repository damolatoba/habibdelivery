@extends('layouts.app')

@section('content')
<!-- content -->
<!-- Update a branch modal  -->
<div id="myModal2" class="modal2">

        <!-- Modal content -->
    <div class="modal-content2">
        <a class="close2" data-role="close">&times;</a>
        <h3 style="color:#32a852;padding:0 0 10px 0;text-align:center;">Update this branch.</h3>
            <form method="POST" action="/account/branches/update">
                @csrf

                <!-- @method('PUT') -->

                <div class="form-group row">
                    <label for="branch" class="col-md-6 col-form-label text-md-right">{{ __('Branch Name') }}</label>

                    <div class="col-md-6">
                        <input id="rowid" type="hidden" name="rowid" required autocomplete="branch name" autofocus>
                        <input id="branchName" type="text" name="branch" required autocomplete="branch name" autofocus>

                        <!-- @error('branch')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-md-6 col-form-label text-md-right">{{ __('Location') }}</label>

                    <div class="col-md-6">
                        <input id="branchLocation" type="text" name="location" required autocomplete="location">

                        <!-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="form-group row">
                    <label for="manager-name" class="col-md-6 col-form-label text-md-right">{{ __('Manager Name') }}</label>

                    <div class="col-md-6">
                        <input id="managerName" type="text" name="manager-name" required autocomplete="Manager Name">

                        <!-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="form-group row">
                    <label for="manager-mobile" class="col-md-6 col-form-label text-md-right">{{ __('Manager Mobile') }}</label>

                    <div class="col-md-6">
                        <input id="managerMobile" type="text" name="manager-mobile" required autocomplete="Manager Mobile">

                        <!-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" style="width:100%;">
                                {{ __('Update Branch/Store Info') }}
                            </button>
                        </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
    </div>
</div>


<!-- Create a new branch modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 style="color:#32a852;padding:0 0 10px 0;text-align:center;">Create a new branch.</h3>
            <form method="POST" action="/account/branches/store">
                @csrf

                <!-- @method('PUT') -->

                <div class="form-group row">
                    <label for="branch" class="col-md-6 col-form-label text-md-right">{{ __('Branch Name') }}</label>

                    <div class="col-md-6">
                        <input id="branch" type="text" name="branch" required autocomplete="branch name" autofocus>

                        <!-- @error('branch')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-md-6 col-form-label text-md-right">{{ __('Location') }}</label>

                    <div class="col-md-6">
                        <input id="location" type="text" name="location" required autocomplete="location">

                        <!-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="form-group row">
                    <label for="manager-name" class="col-md-6 col-form-label text-md-right">{{ __('Manager Name') }}</label>

                    <div class="col-md-6">
                        <input id="manager-name" type="text" name="manager-name" required autocomplete="Manager Name">

                        <!-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="form-group row">
                    <label for="manager-mobile" class="col-md-6 col-form-label text-md-right">{{ __('Manager Mobile') }}</label>

                    <div class="col-md-6">
                        <input id="manager-mobile" type="text" name="manager-mobile" required autocomplete="Manager Mobile">

                        <!-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" style="width:100%;">
                                {{ __('Create New Branch/Store') }}
                            </button>
                        </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
    </div>

</div>


<!-- delete a branch modal -->
<div id="myModal3" class="modal3">

<!-- Modal content -->
    <div class="modal-content3">
        <a class="close2" data-role="close">&times;</a>
        <h3 style="color:#32a852;padding:0 0 10px 0;text-align:center;">Delete branch.</h3>
        <p style="color:black;text-align:center;">Are you sure you want to delete branch <b><span id="delbranchName" style="color:#32a852;"></span></b></p>
            <form method="POST" action="/account/branches/delete">
                @csrf

                <!-- @method('PUT') -->

                <div class="form-group row mb-0">
                    <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <input id="delid" type="hidden" name="delid" required autocomplete="branch name" autofocus>
                            <button type="submit" class="btn btn-danger" style="width:100%;">
                                {{ __('Delete') }}
                            </button>
                            <!-- <button href="/account/branches/" class="btn btn-warning" style="width:100%;">
                                {{ __('Cancel') }}
                            </button> -->
                        </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
    </div>
</div>


    <div class="row" >
        <div class="col-md-9">
            <h1 style="padding:0 10px;">Branch Manager</h1>
        </div>
        <div class="col-md-3">
            <button  id="myBtn" class="btn btn-primary" style="width:100%;margin:10px;">{{ __('Create New Branch/Store') }}</button>
        </div>
    </div>


    


        @if (count($branches)>0)
            <div style="padding:0 10px 30px; 10px;">
                <h3 style="color:#32a852;padding:10px;text-align:center;">Branch List</h3>
                <table id="customers">
                    <tr>
                        <th>Branch</th>
                        <th>Location</th>
                        <th>Manager</th>
                        <th>Contact</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($branches as $product)
                    <tr id = "{{ $product->id }}">
                        <td data-target="branchName"><p>{{ $product->branch_name }}</p></td>
                        <td data-target="branchLocation"><p>{{ $product->location }}</p></td>
                        <td data-target="managerName"><p>{{ $product->manager_name }}</p></td>
                        <td data-target="managerMobile"><p>{{ $product->manager_mobile }}</p></td>
                        <td><button data-role="update" data-id="{{ $product->id }}" class="btn btn-primary" style="width:100%;">{{ __('Edit') }}</button></td>
                        <td><button data-role="delete" data-id="{{ $product->id }}" class="btn btn-danger" style="width:100%;">{{ __('Delete') }}</button></td>
                    </tr> 
                    @endforeach
                </table>
                {{ $branches->links() }}
            </div>
        @else
            <div style="background-color:white;padding:25px;margin:150px 10px;text-align:center;">
                <p>No records available for branches/stores at the moment. Please create one.</p>
            </div>
        @endif
        

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        
        }




$(document).ready(function(){

//  append values in input fields
  $(document).on('click','button[data-role=update]',function(){
        var id  = $(this).data('id');
        var branchName  = $('#'+id).children('td[data-target=branchName]').text();
        var branchLocation  = $('#'+id).children('td[data-target=branchLocation]').text();
        var managerName  = $('#'+id).children('td[data-target=managerName]').text();
        var managerMobile  = $('#'+id).children('td[data-target=managerMobile]').text();

        $('#rowid').val(id);
        $('#branchName').val(branchName);
        $('#branchLocation').val(branchLocation);
        $('#managerName').val(managerName);
        $('#managerMobile').val(managerMobile);

        

        $('#myModal2').css("display", "block");
        console.log(typeof(id));

        

  });

  $(document).on('click','button[data-role=delete]',function(){
        var id  = $(this).data('id');
        var branchName  = $('#'+id).children('td[data-target=branchName]').text();
        // var branchLocation  = $('#'+id).children('td[data-target=branchLocation]').text();
        // var managerName  = $('#'+id).children('td[data-target=managerName]').text();
        // var managerMobile  = $('#'+id).children('td[data-target=managerMobile]').text();

        $('#delid').val(id);
        $('#delbranchName').text(branchName);
        // $('#branchLocation').val(branchLocation);
        // $('#managerName').val(managerName);
        // $('#managerMobile').val(managerMobile);

        

        $('#myModal3').css("display", "block");
        // console.log(id);

        

  });

  

  $(document).on('click','a[data-role=close]',function(){
        var id  = $(this).data('id');
        $('#myModal2').css("display", "none");
  });

  $(document).on('click','a[data-role=close]',function(){
        var id  = $(this).data('id');
        $('#myModal3').css("display", "none");
  });


});



    </script>
@endsection