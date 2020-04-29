@extends('layouts.fe')

@section('content')
    <div>
        <a href="/"><img src='../../../images/Logo.png' class="logoimagebranch"/></a>
                @if (count($branches)>0)
                    <div>
                @foreach ($branches as $b)
                        <div class="brancheslist">
                            <span class="branchcap" data-id='{{$b->id}}' data-name='{{$b->branch_name}}'>{{$b->branch_name}}</span>
                        </div>
                @endforeach
                    </div>
                @else
                    <div>
                        <p>No branches available at the moment.</p>
                    </div>

                @endif
        <div class="locationList">
        <p class="locationInquiry">IF YOUR LOCATION IS NOT AVAILABLE ON THE LIST ABOVE,</p>
        <p class="locationInquiry">DROP US AN EMAIL - <span class="email">lagos@habibdelivery.com</span></p>
        </div>  
    </div>
    <script>
        $(document).ready(function(){
            $(".brancheslist").on("click", function(){
                var dataId = $(this).attr("data-id");
                var dataName = $(this).attr("data-name");
                var SelectedBranch = {id:dataId, name:dataName};
                localStorage.setItem("SelectedBranch", JSON.stringify(SelectedBranch));
                window.location.replace("/products");
            });
        });
    </script>
@endsection