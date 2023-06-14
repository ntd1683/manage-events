@props([
    'value' => '',
    'name' => ''
   ])
@push('css')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        .disabled {
            cursor: not-allowed !important;
        }
        .tagify_content{
            font-family: fontAwesome;
        }
        :root {
            --tagify-dd-item-pad: .5em .7em;
        }

        .tagify__dropdown.users-list .tagify__dropdown__item{
            color: black;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 0 1em;
            grid-template-areas: "avatar name"
                        "avatar email";
        }

        .tagify__dropdown.users-list .tagify__dropdown__item:hover .tagify__dropdown__item__avatar-wrap{
            transform: scale(1.2);
        }

        .tagify__dropdown.users-list .tagify__dropdown__item__avatar-wrap{
            grid-area: avatar;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            background: #EEE;
            transition: .1s ease-out;
        }

        .tagify__dropdown.users-list img{
            width: 100%;
            vertical-align: top;
        }

        .tagify__dropdown.users-list header.tagify__dropdown__item > div,
        .tagify__dropdown.users-list .tagify__dropdown__item strong{
            grid-area: name;
            width: 100%;
            align-self: center;
        }

        .tagify__dropdown.users-list span{
            grid-area: email;
            width: 100%;
            font-size: .9em;
            opacity: .6;
        }

        .tagify__dropdown.users-list .tagify__dropdown__item__addAll{
            border-bottom: 1px solid #DDD;
            gap: 0;
        }

        .tagify__dropdown.users-list .remove-all-tags{
            float: right;
            font-size: .8em;
            padding: .2em .3em;
            border-radius: 3px;
            user-select: none;
        }

        .tagify__dropdown.users-list .remove-all-tags:hover{
            color: white;
            background: salmon;
        }


        /* Tags items */
        #users-list .tagify__tag{
            white-space: nowrap;
        }

        #users-list .tagify__tag img{
            width: 100%;
            vertical-align: top;
            pointer-events: none;
        }


        #users-list .tagify__tag:hover .tagify__tag__avatar-wrap{
            transform: scale(1.6) translateX(-10%);
        }

        #users-list .tagify__tag .tagify__tag__avatar-wrap{
            width: 16px;
            height: 16px;
            white-space: normal;
            border-radius: 50%;
            background: silver;
            margin-right: 5px;
            transition: .12s ease-out;
        }

        .users-list .tagify__dropdown__itemsGroup:empty{
            display: none;
        }

        .users-list .tagify__dropdown__itemsGroup::before{
            content: attr(data-title);
            display: inline-block;
            font-size: .9em;
            padding: 4px 6px;
            margin: var(--tagify-dd-item-pad);
            font-style: italic;
            border-radius: 4px;
            background: #00ce8d;
            color: white;
            font-weight: 600;
        }

        .users-list .tagify__dropdown__itemsGroup:not(:first-of-type){
            border-top: 1px solid #DDD;
        }
    </style>
@endpush
<input type="hidden" value="{{ asset('json/fontawesome.json') }}" id="json_fontawesome">
<div id="divTagify">
    <input type="text" id="inputTagify" disabled {{ $attributes->merge(["class" => "form-control d-none disabled"]) }} value="{{ $value }}"/>
    <input type="text" id="inputTagifyTmp" value="{{ $value }}"/>
    <input type="hidden" id="icon" name="{{ $name }}" value="{{ $value }}">
</div>

@push('js')
    <script src="{{ asset('js/fontawesome.js') }}"></script>
@endpush
