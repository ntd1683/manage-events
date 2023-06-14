window.$ = window.jQuery = require('jquery')
import Tagify from '@yaireo/tagify'

function tagTemplate(tagData) {
    return `
        <tag title="${tagData.name}"
                contenteditable='false'
                spellcheck='false'
                tabIndex="-1"
                class="tagify__tag ${tagData.class ? tagData.class : ""}"
                ${this.getAttributes(tagData)}>
            <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
            <div>
                <span class='tagify__tag-text'><span class="tagify_content">${tagData.content}</span> ${tagData.value}</span>
            </div>
        </tag>
    `
}

function suggestionItemTemplate(tagData) {
    return `
        <div ${this.getAttributes(tagData)}
            class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
            tabindex="0"
            role="option">
            <span>
            <strong class="tagify_content">${tagData.content}</strong>${tagData.value}
            </span>
        </div>
    `
}

$(async function () {
    let linIconkFontawesome = $('#json_fontawesome').val();

    const iconFetch = await fetch(linIconkFontawesome);
    const iconJson = await iconFetch.json();
    const icon = iconJson.icon;

    let inputTagifyTmp = document.querySelector('#inputTagifyTmp');
    let tagify = new Tagify(inputTagifyTmp, {
        originalInputValueFormat: (valuesArr) => valuesArr.map((item) => item.value),
        templates: {
            tag: tagTemplate,
            dropdownItem: suggestionItemTemplate,
        },
        dropdown: {
            classname: "users-list",
            enabled: 0,
            position: "text",
            closeOnSelect: false,
            highlightFirst: true
        },
        whitelist: icon,
    });

    let value;
    let arrValue;

    $('#inputTagifyTmp').change(async () => {
        value = $('#inputTagifyTmp').val();
        arrValue = value.split(',');
        if(arrValue.length > 1) {
            value = arrValue[1];
        }

        $('#inputTagify').val(value);
        $('#icon').val(value);
        $("#inputTagify").removeClass('d-none');
        $('#inputTagifyTmp').addClass('d-none');
        $('.tagify').addClass('d-none');
    });
    $('#back_icon').click(() => {
        backIcon();
    })
    function backIcon() {
        $('#inputTagifyTmp').val(value);
        if($('#inputTagifyTmp').hasClass('d-none')) {
            $('#inputTagifyTmp').removeClass('d-none');
            $('.tagify').removeClass('d-none');
            $("#inputTagify").addClass('d-none');
        }
    }
});
