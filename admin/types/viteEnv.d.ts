/// <reference types="vite/client" />

interface ImportMetaEnv {
    VITE_ROUTER_AUTOLOAD: boolean
    VITE_API_URL: string
    VITE_APPNAME: string
}

interface ImportMeta {
    readonly env: ImportMetaEnv
}
