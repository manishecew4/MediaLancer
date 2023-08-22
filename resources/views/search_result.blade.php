@extends('layouts.user')

@section('content')
    <section class="searchBody d-flex mt60px pt-3">
        
        <div class="accordion searchFilter" id="accordionPanelsStayOpenExample">
            
            <hr>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed h5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Ratings
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rating" value="1" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                4 <i class="fa-regular fa-star"></i> & above
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rating" value="2" id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">
                                3 <i class="fa-regular fa-star"></i> & above
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rating" value="3" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                2 <i class="fa-regular fa-star"></i> & above
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rating" value="4" id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">
                                1 <i class="fa-regular fa-star"></i> & above
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <select name="location" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                <option selected disabled>Location</option>
                <option value="1">Kolkata</option>
                <option value="2">Bandel</option>
                <option value="3">Bardhman</option>
            </select>
            <hr>
            <div>
                <button onclick="applyFilters()">Apply Filters</button>
            </div>
        </div>
        <div class="col ms-3 p-3">
            <div class="filterHead d-flex jcsb aic pb-3">
                <h5 class="mb-0 ms-2 fw-bold">Result</h5>
      
                <div class="d-flex">
                    <select name="sortRating" class="form-select emp_filter" aria-label="Default select example">
                        <option value="" >Sort By Rating</option>
                        <option value="high">High to Low</option>
                        <option value="low">Low to High</option>
                    </select>
                    <select name="sortPrice" class="form-select emp_filter ms-3" aria-label="Default select example">
                        <option value="" >Sort By Price</option>
                        <option value="high">High to Low</option>
                        <option value="low">Low to High</option>
                    </select>
                </div>
            </div>
            <div class="searchResult d-flex flex-wrap bg-white p-3" id="productList">
                @foreach($allVendor as $item)
                
                <div class="p-2 col-12">
                    <a href="{{ route('user.emp_details', ['id' => $item->vendor_id]) }}" class="card flex-row noAnchor" style="height: 200px;">
                        <div class="pr h-100">
                            <img src="{{$item->avatar_vendor}}" class="card-img-top h-100" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="">{{$item->name}}</h5>
                            <p class="card-text">{{$item ? $item->srt_desc : ''}}</p>
                            <span class="d-flex aic ratingSearch">
                                {{$item->avg_rating != null? $item->avg_rating: 0 }}/5
                            </span>
                            <h5 class="mt-3"> Start at Rs. {{$item ? $item->price : ''}}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>


        function applyFilters() {
            var productList = $('#productList');
            
            var ratingFilters = Array.from(document.querySelectorAll('input[name="rating"]:checked')).map(function (input) {
                return parseInt(input.value);
            });
            var sortRatingFilter = document.querySelector('select[name="sortRating"]') ? document.querySelector('select[name="sortRating"]').value : '';
            var sortPriceFilter = document.querySelector('select[name="sortPrice"]') ? document.querySelector('select[name="sortPrice"]').value : '';
        
            // Filter and sort operations
            var filteredProducts = products.filter(function (product) {
                // Apply filters
                var ratingMatches = ratingFilters.length === 0 || ratingFilters.includes(product.avg_rating);
                
                return ratingMatches;
            });

            // Sort operations
            if (sortRatingFilter === 'high') {
                filteredProducts.sort(function (a, b) {
                    return b.avg_rating - a.avg_rating;
                });
            } else if (sortRatingFilter === 'low') {
                filteredProducts.sort(function (a, b) {
                    return a.avg_rating - b.avg_rating;
                });
            } else if (sortPriceFilter === 'high') {
                filteredProducts.sort(function (a, b) {
                    return b.price - a.price;
                });
            } else if (sortPriceFilter === 'low') {
                filteredProducts.sort(function (a, b) {
                    return a.price - b.price;
                });
            }

            // Clear the existing product list
            productList.empty();

            // Update the product list
            var htmlArray = filteredProducts.map(function (product) {
                console.log(product);
                return `
                    <div class="p-2 col-12">
                        <a href="http://localhost/manish/public/employee?id=${product.vendor_id}" class="card flex-row noAnchor" style="height: 200px;">
                            <div class="pr h-100">
                                <img src="${product.avatar_vendor}" class="card-img-top h-100"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="">${product.name}</h5>
                                <p class="card-text">${product.srt_desc}</p>
                                <span class="d-flex aic ratingSearch">
                                    ${product.avg_rating}/5
                                </span>
                                <h5 class="mt-3"> Start at Rs. ${product.price}</h5>
                            </div>
                        </a>
                    </div>
                `;
            });

            // Join the HTML strings and append to the product list
            productList.append(htmlArray.join(''));
        }




        var products = @json($allVendor);
        // Now you can access the PHP variable in JavaScript
        console.log(products);
    
    </script>
    
@endsection