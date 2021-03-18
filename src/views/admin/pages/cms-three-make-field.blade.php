@foreach ($subSections as $label=>$block)
    @php
    
        $block = (array)$block;
        $value = '';
        
        // data will works when called from cms field and loop element
        if(
            isset($data)
            &&
            isset($data->$label)
            &&
            isset($data->$label->value)
        ){
            $value = $data->$label->value;
        }

        // data2 will works for single sections
        
        if(
            isset($data2)
            &&
            isset($data2->$label)
            &&
            isset($data2->$label->value)

        ){
            $value = $data2->$label->value;
        }

    @endphp

    <div class="form-group">
        {{-- save every subsection name of each section  --}}
        <input type="hidden" name="inner_sections_{{$key}}" value="{{$count}}">
        <label
            for="exampleInputuname">{{ strtoupper( str_replace('_',' ',$label)) }}</label>
        <div class="input-group mb-3">

            {{-- @if (isset($block['field_type'])) --}}
                
                @if ($block['field_type'] == 'text')

                    <input type="text" class="form-control"
                        name="{{$key.($count).'_'.$label}}"
                        placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}"
                        value="{{ $value }}">
                
                @elseif($block['field_type'] == 'file')

                    <input type="hidden" name="{{$key.($count).'_'.$label}}_image_old"
                        value="{{ $value }}">

                    <input type="file" class="form-control"
                        name="{{$key.($count).'_'.$label}}"
                        placeholder="{{ strtoupper( str_replace('_',' ',$label)) }}">

                    <img style="height:50px; margin:0px 0px 0px 10px;"
                        src="/{{ $value }}" alt="">

                @elseif($block['field_type'] == 'text_area')

                    <textarea class="form-control" name="{{$key.($count).'_'.$label}}">{{ $value }}</textarea>
                
                @endif

            {{-- @else --}}
                {{-- @php
                    dd($subSections,$key,$key2,$label,$block);
                @endphp --}}
            {{-- @endif --}}

        </div>
    </div>

@endforeach