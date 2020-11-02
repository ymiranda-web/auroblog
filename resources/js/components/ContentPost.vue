<template>
        <div v-html="content" v-highlight></div>
</template>

<script>
import "vue-code-highlight/themes/duotone-sea.css";
import "vue-code-highlight/themes/window.css";

import VueCodeHighlight from 'vue-code-highlight';
Vue.use(VueCodeHighlight);

export default {
    name: "content-post",
    props: ['content']
}
</script>
