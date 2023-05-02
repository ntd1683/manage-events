const translations = (key, params) => {
    let translation = ''

    if (App.translations) {
        translation = App.translations[key] || key

        if (params) {
            Object.keys(params).map((key) => {
                translation = translation.replace(':' + key, params[key])
            })
        }

        return translation
    }
}
