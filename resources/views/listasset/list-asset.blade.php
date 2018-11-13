@extends('layouts.app')

@section('page-title', 'Asset Gallery')
@section('page-heading', 'Asset Gallery')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Asset Gallery
    </li>
@stop

@section('content')
<div class="container" id="Asset-list">


<div class="row">
    <div class="col-xs-12 w-100">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="input-group custom-search-form">
                        <input id="search" type="text" class="form-control input-solid search" name="search" value="" placeholder="Search for Asset...">
                        <span class="input-group-append">
                        <button class="btn btn-light" type="submit" id="search-users-btn">
                            <i class="fa fa-search text-muted"></i>
                        </button>
                        </span>
                </div>
            </div>
        </div>

<?php 
// echo "<pre>";
// print_r($data->result);
// die;
$tmpKey = "";
?>
    @foreach($data->result as $asset)
        <?php 
            $tmpKey .= str_replace(', ', ',', $asset->keywords) . ",";
        ?>
    @endforeach
<?php 
$KeyWords = explode(",", $tmpKey);
asort($KeyWords);
?>
        <div class="row">
        <div class="col-xs-2 col-lg-2 col-md-2 col-sm-12 mb-4">
                    <div class="filterobj">  
                    <input id="dates" name="dates" class="btn default-color form-control m-0 mb-2" placeholder="Pick Date Range">

                        <div class="mb-2 bg-aqua-gradient c2">
                            <div role="assettype" id="media-type-header" style="text-align: left; padding-left: 10px;" class="search-section-header sidebarh1 small-box-footer chip teal primary-color"><i class="fa fa-minus"></i> Asset Types </div>


                        </div>
                        <div class="mb-2 blue lighten-5">
                            <div role="keywords" id="id-cardkeywords" style="text-align: left; padding-left: 10px;" class="blue darken-4 white-text"><i class="fa fa-minus"></i> Keywords </div>

                            @foreach(array_unique(array_filter($KeyWords)) as $KeyFilterName)
                                <div class="custom-control custom-checkbox" rel="cardkeywords">
                                <input type="checkbox" class="custom-control-input" id="{{ $KeyFilterName }}-filter" rel="cardkeywords" name="{{ $KeyFilterName }}">
                                <label class="custom-control-label" for="{{ $KeyFilterName }}-filter">{{ $KeyFilterName }}</label>
                                </div>
                            @endforeach

                        </div>
                    </div>
        </div>
        <div class="col-xs-10 col-lg-10 col-md-10 col-sm-12 mb-4">
        <div class="row asset-group w-100">
        <div>
        <ul class="list">

    @foreach($data->result as $asset)
    <?php 
    if(isset($asset->{'preview-link'})){
        $PrevLink = $asset->{'preview-link'};
    }else{
        $PrevLink = "/images/no-image-found.png";
    }
    
    ?>
 <li class="float-left col-xs-4 col-lg-4 col-md-4 col-sm-6 mb-4">
        <div id="card-id-{{$asset->id}}" class="asset-group-item  filter{{ str_replace(',', ' ', $asset->keywords) }}">
            <div class="card">
                <div class="card-block">
                    <div class="img-wrapper">
                        <a class="thumbnail" data-fancybox="gallery" href="{{ $PrevLink }}">
                            <img class="card-img-top" src="{{ $PrevLink }}" alt="{{ $asset->name }}">
                        </a>
                    </div>
                    <div class="card-body" id="{{$asset->id}}">
                        <h5 class="card-title">{{ $asset->name }}</h5>
                        <p class="card-text">{{ $asset->{'description'} }}</p>
                        <p class="d-none card-keywords cardkeywords">{{ $asset->keywords }}</p>

<input id="input-{{$asset->id}}" name="input-{{$asset->id}}" class="rating rating-loading" data-show-clear="false" data-readonly="true" data-show-caption="false" data-size="xs" data-min="0" data-max="5" data-step="0.1" value="{{ isset($asset->rating) ? $asset->rating : 0 }}">

<small class="text-muted">
<a href="#" class="AssetEdit">
<i class="fa fa-edit" data-toggle="modal" data-target="#AssetModal"></i>
</a>
<a class="AssetView"><i class="fa fa-eye"></i></a>
<a id="AssetDownload" href="{{ $PrevLink }}" type="application/octet-stream"  target="_blank" download><i class="fa fa-download"></i></a>
</small>
                    </div>
                </div>
            </div>
        </div>
    </li>
    
    @endforeach

</ul>
<ul class="pagination"></ul>

        </div>

        </div>
</div>

</div>

<!-- The Modal -->
<div class="modal" id="AssetModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="{{ url('/asset-update') }}" id="AssetUpdateForm" method="POST">
      <!-- Modal Header -->
      {{ csrf_field() }}
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <input type="hidden" class="form-control" name="form-id" id="form-id">
      <input type="hidden" class="form-control" name="form-name" id="form-name">
  <div class="form-group">
    <label>Description:</label>
    <textarea class="form-control" rows="2" name="form-description" id="form-description"></textarea>
  </div>
  <div class="form-group">
    <label>Keywords:</label>
    <input type="text" class="form-control" name="form-keywords" id="form-keywords">
  </div>
  <div class="form-group">
    <label>Asset URL:</label>
    <input type="text" class="form-control" name="form-content-link" id="form-content-link">
  </div>
    <div class="form-group form-check">
        <input name="form-rating" id="form-rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
    </div>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>






</div>

</div>
@stop



@section('scripts')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.0/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="{{ url('js/star-rating.js') }}"></script>
<script type="text/javascript" src="{{ url('js/list.js') }}"></script>
<script>
jQuery(function(){

var options = {
    valueNames: ['cardkeywords', 'card-title', 'card-text' ],
    page: 9,
  pagination: true
};

var featureList = new List('Asset-list', options);


    jQuery('#search').val('');

    jQuery(".AssetEdit").click(function(){
//        alert('aaaaaa');
        jQuery('.modal-title').html(jQuery(this).closest(".card-body").find( ".card-title" ).text());
        jQuery('#form-name').val(jQuery(this).closest(".card-body").find( ".card-title" ).text());
        jQuery('#form-description').val(jQuery(this).closest(".card-body").find( ".card-text" ).text());
        jQuery('#form-keywords').val(jQuery(this).closest(".card-body").find( ".card-keywords" ).text());
        jQuery('#form-id').val(jQuery(this).closest(".card-body").attr("id"));
        //alert(jQuery(this).closest(".card-body").find(".rating").val() + "aaaaaa");
        jQuery('#form-rating').val(jQuery(this).closest(".card-body").find(".rating").val());
        jQuery('#form-content-link').val(jQuery(this).closest(".card-block").find(".card-img-top").attr("src"));

        //jQuery('#form-rating').rating({value: 3});
    });

    jQuery(".AssetView").click(function(){
        jQuery(this).closest(".card-block").find( ".thumbnail" ).click();
    });



jQuery('input[id*="-filter"]').click(function(){
//alert("adasdada");
            processlist();
            //        return false;
});

        function processlist()
        {
            $('.list').show();
            $('.paging').show();
            var myCommand = "";
            var myvalue = new Array();
            $('.filterobj input[type=checkbox]').each(function() {

                if (this.checked)
                {
                    myvalue.push([$(this).attr("rel"), $(this).attr("name")]);
                }
            });
            //console.log(myvalue);
            var LastRunKey = "first";
            if(myvalue.length > 0){
            for (var i = 0; i < myvalue.length; i++) { // iterate on the array
                var key = myvalue[i][0];
                var value = myvalue[i][1];

                //console.log("Val: " + value + " Key: " + key);

                if (LastRunKey == "first")
                {
                    LastRunKey = key;
                    myCommand = "(";
                } else
                {
                    if (LastRunKey == key)
                    {
                        myCommand = myCommand + ' || ';
                    } else
                    {
                        myCommand = myCommand + ') && (';
                    }
                    LastRunKey = key;
                }
                myCommand = myCommand + '(item.values().' + key + '.toLowerCase().indexOf(\"' + value.toLowerCase() + '\") !== -1)';
            }
            myCommand = myCommand + ")";
        }


            featureList.filter(function(item) {
//                    alert(JSON.stringify(item.values()));
                //myCommand  = '(item.values().Category.toLowerCase() == "indd") && ((item.values().Source.toLowerCase() == "children\'s book press") || (item.values().Source.toLowerCase() == "getty images"))';
                 console.log(myCommand);
                //return (item.values().Category.toLowerCase() == 'photo') && (item.values().LicenseType.toLowerCase() == 'royalty free');
                if (myCommand == "")
                {
                    return false;
                } else if (myCommand == "")
                {
                    return true;
                } else
                {
                    return eval(myCommand);
                }
//            processlist($(this));
            });

        }



jQuery('input[name="dates"]').daterangepicker();

jQuery('#id-cardkeywords').click(function(){
            $('div[rel="cardkeywords"]').toggle();
            if($(this).find('i.fa-minus').length !== 0){
                $(this).find('i.fa-minus').addClass('fa-plus');
                $(this).find('i.fa-minus').removeClass('fa-minus');
            }else{
                $(this).find('i.fa-plus').addClass('fa-minus');
                $(this).find('i.fa-plus').removeClass('fa-plus');
            }

        });






});	

</script>

@stop


@section('template_linked_css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link media="all" type="text/css" rel="stylesheet" href="{{ url('css/star-rating.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />

<style>

.img-wrapper {
position: relative;
overflow: hidden;
}

.img-wrapper:after {
content: '';
display: block;
padding-top: 100%;
}

.img-wrapper img {
width: auto;
height: 100%;
max-width: none;
position: absolute;
left: 50%;
top: 0;
transform: translateX(-50%);
}
.custom-search-form{
background: white !important; 
border: 1px solid #ced4da;
border-top-color: rgb(206, 212, 218);
border-right-color: rgb(206, 212, 218);
border-right-style: solid;
border-right-width: 1px;
border-bottom-color: rgb(206, 212, 218);
border-left-color: rgb(206, 212, 218);
border-radius: .25rem;
border-top-right-radius: 0.25rem;
border-bottom-right-radius: 0.25rem;
-webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;   
}
#search{
    margin-top: 10px;
}
.list {
    list-style-type: none;
    padding: 0;
}
.pagination{
    clear:both;
}
.pagination li {
  display:inline-block;
  padding:5px;
}
.card{
    min-width: 300px;
    min-height: 400px;
}
.custom-control{
    padding-left: 2rem!important;
}







</style>
@stop
