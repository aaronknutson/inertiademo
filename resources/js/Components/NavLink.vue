<template>
  <Link class="text-slate-800" :class="{ 'font-bold underline': active }">
    <slot />
  </Link>
</template>

<script>
export default {
  props: {
    active: Boolean,
  },
};
</script>
