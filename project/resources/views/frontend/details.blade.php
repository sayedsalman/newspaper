@extends('layouts.front')
@section('contents')
@section('meta')
<title>{{$data->title}}</title>
<meta name="Description" content="{!! $data->short_description !!}">
<meta name="Keywords" content="{!! $data->meta_tag !!}">
<meta property="og:title" content="{{$data->title}}" />
<meta property="og:description" content="{!! $data->short_description !!}" />
<meta property="og:image" content="{{asset('assets/images/post/'.$data->image_big)}}" />
@endsection

 
  <!--==========ThemesBazar=============
                        Section-One Start
                    ==============ThemesBazar============-->
        <div class="all-section" ><!-- All Section-->

            <section class="single-page">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="white">
                                <div class="cat-info">
                                    <ul>
                                        <li><a href="#"> <i class="las la-home"></i> /  </a></li>
                                        <li><a href="#"> {{$data->category->title}} </a></li>
                                    </ul>
                                </div>

                                <h2 class="single-title">
                                   {{$data->title}}
                                </h2>

                                @if($data->subtitle)
                                <h3 class="single-subtitle">
                                    {{$data->subtitle}}
                                </h3>
                                @endif

                                @php
                                    $isJournalist = ($data->admin_id == 0 && $data->user_id != 0);
                                    $author       = $isJournalist ? $data->user : $data->admin;
                                    $authorName   = $author->name ?? '';
                                @endphp

                                <div class="reporter-section">
                                    <div class="row align-items-center">
                                        <div class="col-lg-7 col-md-7">
                                            <div class="reporter-name">
                                                @if($authorName)
                                                <a href="{{ route('front.authorProfile', $authorName) }}" class="reporter-link" title="{{ __('See all posts by') }} {{ $authorName }}">
                                                    <i class="las la-pen"></i> {{ $authorName }}
                                                </a>
                                                @endif

                                                <div class="report-date">
                                                    <i class="las la-clock"></i>  নিউজ প্রকাশের তারিখ :
                                                    {{$data->createdAt()}} ইং
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5">
                                            <div class="single-share-bar">
                                                <span class="share-label">{{ __('Share') }}:</span>
                                                <a class="share-btn share-fb" target="_blank" rel="noopener"
                                                   title="Facebook"
                                                   href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}">
                                                    <i class="lab la-facebook-f"></i>
                                                </a>
                                                <a class="share-btn share-tw" target="_blank" rel="noopener"
                                                   title="X / Twitter"
                                                   href="https://twitter.com/intent/tweet?url={{ urlencode(URL::current()) }}&text={{ urlencode($data->title) }}">
                                                    <i class="lab la-twitter"></i>
                                                </a>
                                                <a class="share-btn share-wa" target="_blank" rel="noopener"
                                                   title="WhatsApp"
                                                   href="https://api.whatsapp.com/send?text={{ urlencode($data->title.' - '.URL::current()) }}">
                                                    <i class="lab la-whatsapp"></i>
                                                </a>
                                                <a class="share-btn share-li" target="_blank" rel="noopener"
                                                   title="LinkedIn"
                                                   href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}">
                                                    <i class="lab la-linkedin-in"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="share-btn share-copy" title="{{ __('Copy Link') }}"
                                                   data-copy-link="{{ URL::current() }}" onclick="bpCopyShareLink(this)">
                                                    <i class="las la-link"></i>
                                                </a>
                                                <a class="share-btn share-print" target="_blank" title="{{ __('Print') }}"
                                                   href="{{ URL::to('print/'.$data->id.'/'.$data->slug)}}">
                                                    <i class="las la-print"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="singlePage-image">
                                <img class="lazyload" src="{{asset('assets/images/post/'.$data->image_big)}}" data-src="{{asset('assets/images/post/'.$data->image_big)}}" alt="ছবির ক্যাপশন: {{ $data->images_caption }}" title="ছবির ক্যাপশন: {{ $data->images_caption }}">
                                <span style="font-style: italic; color: #333;"> ছবির ক্যাপশন: {{ $data->images_caption }} </span>
                            </div>

                            <script>
                            function bpCopyShareLink(el){
                                var link = el.getAttribute('data-copy-link');
                                if (navigator.clipboard && navigator.clipboard.writeText) {
                                    navigator.clipboard.writeText(link);
                                } else {
                                    var tmp = document.createElement('input');
                                    document.body.appendChild(tmp);
                                    tmp.value = link;
                                    tmp.select();
                                    document.execCommand('copy');
                                    document.body.removeChild(tmp);
                                }
                                var original = el.innerHTML;
                                el.innerHTML = '<i class="las la-check"></i>';
                                setTimeout(function(){ el.innerHTML = original; }, 1500);
                            }
                            </script>
                            
                           
{!!$gs->homepageads2_970!!}
                            <div class="single-details">
							  
@if ($data->post_type == 'article')
                                    {!! $data->description !!}
								  @endif
								  @if ($data->post_type == 'video')
								
                                  @if ($data->embed_video)							
								  {!! $data->description !!}
								   <iframe width="615" height="400" src="https://www.youtube.com/embed/{!!$data->embed_video!!}" title="Types Of ভাড়াটিয়া || Comedy Special || Sanjay Das - Bishakto Sanju | Joy-Rupam-Ayan-Shuvro || 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
								  @else 
									    <video controls >
                                            <source src="{{asset('assets/videos/'.$data->video)}}" type="video/mp4">
                                        </video>
										@endif
								   
								   @endif
								   
								                              @if ($data->post_type == 'audio')
	<p style="text-align: center;"><b>&nbsp;অডিও&nbsp; ফাইল</b></p>
<audio controls="" style="width:100%">
				 <source src="{{asset('assets/audios/'.$data->audio)}}" type="audio/mp3">
				</audio>
				 {!! $data->description !!}
				@endif



                            </div>

<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-635cdf45c2d9fb68"></script>
                                
                <div class="addthis_inline_share_toolbox"></div> 

<div style="margin-top: 20px; border-bottom: 1px solid #ddd; padding: 8px 0px;"> কমেন্ট বক্স </div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0&appId=1716117305495236" nonce="OKS9Fdbx"></script>
<div class="fb-comments" data-href="{{ URL::to($data->id.'/'.$data->slug)}}" data-width="600" data-numposts="10"></div>



</br>



                            <div class="author-section">
                                <div class="author-border">
                                    <h2 class="author-title">
                                    প্রতিবেদকের তথ্য
                                </h2>

                                    <div class="author-image">
                                        <img src="{{asset('assets/images/admin/'.$author->photo)}}" alt="{{ $authorName }}">
                                    </div>
                                    <div class="author-content">
                                        <div class="author-report">
                                            <a href="{{ route('front.authorProfile', $authorName) }}"> {{ $authorName }} </a>
                                        </div>
                                        <div class="author-cat">
                                            <a href="{{ route('front.authorProfile', $authorName) }}"> প্রতিবেদকের মোবাইলঃ {{$author->phone}} </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            

                        
                        

                    






                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="sitebar-fixd" style="position: sticky; top: 0;"><!-- Fixd Siteber -->
                        
                            
                                    
                            
                                   


                            <!-- recommened_content Start -->
							                 @php
				$popular=DB::table('posts')->inRandomOrder()->orderBy('id','DESC')->where('is_feature',1)->limit(6)->get();
				@endphp    
                            <h4 class="recommened_title">
                                 এ জাতীয় আরো খবর
                            </h4>
							
                            <div class="recommened_content">
                                   

								   @foreach($popular as $row) 
                                <div class="recommened_wrpp">
                                    <div class="recommened-image">
                                        <img class="lazyload" src="{{asset('assets/images/post/'.$row->image_big)}}" data-src="{{asset('assets/images/post/'.$row->image_big)}}" alt="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}" title="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}">

                                         

                                        <h5 class="recommened-title">
                                            <a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}"> {{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}  </a>
                                        </h5> 
                                    </div>
                                
                                </div>
                                                                
                                     @endforeach  
								
                                                                     </div>
                            <!-- most poular item End -->



                            <!-- recommened_content Start -->
                            <h4 class="recommened_title">
                                 সর্বশেষ সংবাদ
                            </h4>
                            <div class="recommened_content">
                                                    @php
				$latest=DB::table('posts')->inRandomOrder()->orderBy('id','DESC')->where('is_trending',1)->limit(10)->get();
				@endphp   


									  @foreach ($latest as $row) 
                                <div class="recommened_wrpp">
                                    <div class="recommened-image">
                                        <img class="lazyload" src="{{asset('assets/images/post/'.$row->image_big)}}" data-src="{{asset('assets/images/post/'.$row->image_big)}}" alt="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}" title="{{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}">

                                         

                                        <h5 class="recommened-title">
                                            <a href="{{ route('frontend.postBySubcategory.details',[$row->id,$row->slug])}}"> {{strlen($row->title)>60 ? mb_substr($row->title,0,60,"utf-8") : $row->title}}  </a>
                                        </h5> 
                                    </div>
                                
                                </div>
                                 @endforeach                                
                                
								
								
								
								
								
                                                                     </div>
                            <!-- most poular item End -->


                            
                            






                            </div>
                        </div>




                    </div>
                </div>
            </section>

        </div><!-- All Section Close -->

 
 
 
@endsection