<template>
  <Head>
    <title>Home</title>
  </Head>
  <div class="max-w-6xl mx-auto my-20">
    <h1 class="text-4xl font-black mb-10">Blog</h1>
    <Highlight :code="snippet" />
  </div>
</template>

<script setup>
import Highlight from "@/Components/Highlight.vue";
let snippet = `
class Example
    {
        public function _construct()
        {
            //
        }
    }
`.trim();
</script>
