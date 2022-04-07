<template>
  <div>
    <header v-if="supported" class="flex w-full px-4 justify-end">
      <button
        class="
          py-1
          px-4
          bg-sky-400
          text-slate-700 text-lg
          font-semibold
          text-center
          mb-2
          rounded-xl
          shadow-lg
        "
        @click="copy"
      >
        {{ copied ? "Copied" : "Copy" }}
      </button>
    </header>

    <pre><code>{{ code }}</code></pre>
  </div>
</template>

<script setup>
import { highlight } from "@/Services/SyntaxHighlighting";
import { useClipboard } from "@/Composables/useClipboard";
import { onMounted } from "@vue/runtime-core";

let props = defineProps({
  code: String,
});

let { copy, copied, supported } = useClipboard(props.code);

onMounted(() => {
  highlight();
});
</script>

<style>
@import "/node_modules/highlight.js/styles/github-dark.css";
</style>
