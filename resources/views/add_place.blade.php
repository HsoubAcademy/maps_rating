<x-app-layout>
    <x-slot name="header">
        @include('includes/header') 
    </x-slot>

    <div class="container my-12 mx-auto md:px-12 p-5">
        <h1 class="text-2xl p-5 mb-2">أضف موقعًا </h1>
        <hr class="mb-5"/>
        <form class="form-contact" action="{{ route('place.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="">
                    <label for="name"> اسم الموقع</label>
                    <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="name"/>
                </div>
                <div class="">
                    <label for="catg"> اختر التصنيف</label>
                    <select class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="category_id" >
                    @include('includes.category_list')
                    </select>
                </div>
            </div>
            <div class="">
                    <label for="overview"> نبذة عن الموقع</label>
                    <textarea type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="overview" id="overview" rows="5"></textarea>
            </div>
            <div class="">
                    <label for="details"> اختر صورة </label>
                    <input type="file" name="image"  class="form-control">
            </div>
            <div class="mt-2">
                <div id="mapid" style="height: 350px;"></div>
            </div>
            <div class="mt-4">
                    <label for="address1"> العنوان</label>
                    <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="address" id="address1"/>
            </div>
            <div class="form-group col-lg-6">
                    <label for="long">خط الطول</label>
                    <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="longitude" id="longitude" value=""/>
            </div>
            <div class="form-group col-lg-6">
                <label for="lat">خط العرض</label>            
                <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-400" name="latitude" id="latitude" value=""/>
            </div>
            <button type="submit" class="mt-3 bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">إرسال</button>
        </form> 
    </div>
</x-app-layout>

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js"></script>
<script type="text/javascript">
    var map = L.map('mapid');
    
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);

    map.locate({setView: true, maxZoom: 10});

    map.on('locationfound', function(e) {
        L.marker(e.latlng).addTo(map);
    });

    map.on('locationerror', function(e) {
        alert(e.message);
    });

    var geocodeService = L.esri.Geocoding.geocodeService();

    map.on('mousedown', function(e) {
        $('#latitude').val(e.latlng.lat);
        $('#longitude').val(e.latlng.lng);
        geocodeService.reverse().latlng(e.latlng).run(function(error, result) {
            if(error){
                return;
            }
            
            L.marker(result.latlng).addTo(map).bindPopup(result.address.Match_addr).openPopup();
        })
    })
</script>




