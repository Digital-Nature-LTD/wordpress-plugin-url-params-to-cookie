DNURLPARAMTOCOOKIE.utils = {
    urlParams: new URLSearchParams(window.location.search),
    getUrlParam: function (name) {
        return this.urlParams.get(name);
    },
    setCookie: function(name, value, path, validity) {
        document.cookie = `${name}=${(value || "")}; path=${path}; max-age=${validity};`;
    },
    convert: function() {
        let defaults = DNURLPARAMTOCOOKIE.config.defaults;
        // loop through the url params and convert any we find to cookie
        for (const [paramName, cookieConfig] of Object.entries(DNURLPARAMTOCOOKIE.config.params)) {
            let urlParamValue = DNURLPARAMTOCOOKIE.utils.getUrlParam(paramName);

            if (!urlParamValue) {
                continue;
            }

            this.setCookie(
                cookieConfig.name,
                urlParamValue,
                cookieConfig.path || defaults.path,
                cookieConfig.ttl || defaults.ttl
            );
        }
    }
};

DNURLPARAMTOCOOKIE.utils.convert();
