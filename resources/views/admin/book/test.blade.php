<div class="row">

                                     @php
                                        $stt = 1;
                                     @endphp
                                    <div class="form-group col-md-2" > 
                                        @foreach($book->images as $sp)
                                            <img class="img-fluid" src="{{asset('public/upload/detail')}}/{{$sp->images_book}}" style="margin-top: 32% ;margin-bottom: 15px; margin-left: 30px; height: 180px; width: 180px;">
                                            

                                        @endforeach
                                    </div>
                                   
                                                    {{--  --}}
                                    <div class="form-group col-md-10" > 
                            
                                         @for($i = 1 ; $i <= 3 ; $i++)
                                            <label>Hình {{ $stt++ }} </label>
                                            <div class="form-group col-md-8"> 
                                                <br>

                                                <input type="file" name="image2[]"  class="dropify">
                                            </div>

                                        @endfor
                                    </div>
                                </div>