<style>
    .selectsec {
        padding: 0 10px;
    }
</style>

@extends('layouts.fe')

@section('content')
    <div>
        <a href="/"><img src='../../../images/Logo.png' class="logoimagebranch"/></a>
                @if (count($branches)>0)
                    <div class="selectsec">
                        <select name="selectbranch" id="selectbranch">
                                <option value="0"> Select Branch </option>
                            @foreach ($branches as $b)
                                <option value="{{$b->id}}"> {{$b->branch_name}} </option>
                            @endforeach
                        </select>
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
            $( "#selectbranch" ).change(function() {
                var branch = $(this).children("option:selected").val();
                var SelectedBranch = branch;
                localStorage.setItem("SelectedBranch", JSON.stringify(SelectedBranch));
                window.location.replace("/products");
            });
    </script>
@endsection