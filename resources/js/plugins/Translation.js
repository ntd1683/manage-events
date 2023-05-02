import { translations } from '../utilities'

const TranslationPlugin = {
    install(app) {
        app.config.globalProperties.$trans = (key, params) => translations(key, params)
    },
}

export default TranslationPlugin
