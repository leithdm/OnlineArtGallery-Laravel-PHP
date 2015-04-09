@extends('layouts.main')

@section('title')
    <title>Cube Art Studio | Collage</title>
@stop

@section('content')
    {{--main content--}}
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="viewpage-query">
                        <p id="new-artwork-header">COLLAGE ART</p>

                        <p id="new-artwork-tag">If you’re an admirer of collage art, you’ll probably find one that
                            sparks your interest among our massive selection of collages for sale made by some of
                            the world’s most talented emerging artists. Though the art of collage had been practiced for
                            hundreds of years prior, it wasn’t until the early 20th century that artists including Pablo
                            Picasso and George Braque helped collage gain acceptance into the modern art movement.
                            Collages can be assembled from such disparate materials as photographs, periodical
                            clippings, textiles, colored/textured paper, wood, etc. Many artists often combine painting,
                            drawing, and photo techniques with collage, creating mixed media works both representational
                            and abstract</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-artists">
            <div class="row">
                <div class="col-md-3">
                    {{ Form::open(['method' => 'GET']) }}
                    {{ Form::select('query', array(
                    'search' => 'Search...',
                    'latest' => 'Latest',
                    'views' => 'Popular',
                    'priceLowToHigh' => 'Price Low to High',
                    'priceHighToLow' => 'Price High to Low'),
                    Input::old('select'), array('class' => 'form-control')) }}
                </div>
                <div class="col-md-1">
                    {{ Form::button('<span class="glyphicon glyphicon-search"></span>', array('class'=>'btn btn-info','type'=>'submit'))}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>

        <div>
            <div class="container">
                <div class="row">
                    <hr/>
                    @foreach($categoryArt as $art)
                        <div class="col-md-4">
                            <div class="art-details-youmightlike">
                                <div class="thumbnail" style="padding: 20px">
                                    <a href="{{ URL::to('art/' . $art->category .'/' . $art->id) }}"><img
                                                src="/artPictures/{{ $art->picture }}"
                                                alt="picture"
                                                style="width:300px;height:300px"></a>
                                </div>
                                <p id=gallery-thumbnail-title>{{ "'". $art->title."'"}}</p>

                                <p id=gallery-thumbnail-category>{{ $art->category}}</p>

                                <a href="{{ URL::to('artist/' . $art->artist->id) }}"><p
                                            id=gallery-thumbnail-artist>{{$art->artist->first_name . " " .  $art->artist->second_name }}</p>
                                </a>

                                <p id=gallery-thumbnail-category>{{ $art->artist->country}}</p>

                                <?php setlocale(LC_MONETARY, "en_us"); ?>
                                <p id=gallery-thumbnail-price>€{{ money_format("%!.0i", $art->price)}}</p></span>
                            </div>
                            <div id="gallery-break"></div>
                        </div>
                    @endforeach
                    {{ $categoryArt->appends(Request::except('page'))->links() }}
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="viewpage-query">
                        <hr/>
                        <p id="new-artwork-header">HISTORY OF COLLAGE ART</p>

                        <p id="new-artwork-tag">Collage became more fully developed during the advent of modernism,
                            when
                            Cubist pioneers Pablo Picasso and Georges Braque experimented with the idea of combining
                            fragments of different materials to create a whole new composition. These artists mixed
                            high
                            culture (modern art) with elements of everyday life (pieces of textiles, newspapers,
                            magazines, colored paper, etc.). Dada artists introduced the use of previously existing
                            photographs in their collages, which often commented on the state of German society in
                            the
                            chaos of World War I. The art of collage continued to serve as inspiration in the 1950s
                            and
                            1960s, when assemblage and Pop artists used found objects and images from mass produced
                            advertisements in their works. While many artists today continue with original methods
                            of
                            collage, many introduce newer digital mediums to revitalize the traditional art. </p>
                    </div>
                    <div class="viewpage-query">
                        <hr/>
                        <p id="new-artwork-header">COLLAGE ART TECHNIQUES</p>

                        <p id="new-artwork-tag">The medium of collage places more emphasis on the concept and
                            techniques
                            used to create works rather than the end result itself. Artists cut and paste fragments
                            of
                            various preexisting materials, ranging from newspapers and magazine ads to textiles and
                            found objects, on a variety of surfaces. Some …</p>
                    </div>
                    <div class="viewpage-query">
                        <hr/>
                        <p id="new-artwork-header">FAMOUS COLLAGE ARTISTS</p>

                        <p id="new-artwork-tag">Pablo Picasso and Georges Braque are well known for their Cubist
                            collages that played on perspective and scale. Picasso’s “Still Life with Chair Caning”
                            (1912) is one of the most iconic collages. Picasso created a tabletop still life, using
                            an
                            array of materials including newspaper, rope, and an …</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@stop






