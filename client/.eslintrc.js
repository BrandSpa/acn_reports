module.exports = {
    "extends": "airbnb",
    "parser": "babel-eslint",
    "plugins": [
        "react",
        "jsx-a11y",
        "import"
    ],
    "rules": {
        "jsx-a11y/href-no-hash": 0,
        "jsx-a11y/alt-text": 0,
        "jsx-a11y/anchor-has-content": 0,
        "react/jsx-filename-extension": 0,
        "react/forbid-prop-types": 0,
        "react/no-array-index-key": 0,
        "camelcase": 0,
        "no-return-assign": 0,
        "radix": 0,
        "react/prop-types": 0,
        "no-tabs": 0
    },
    "env": {
        "browser": 1,
        "jest": 1,
        "jquery": 1
    }
};