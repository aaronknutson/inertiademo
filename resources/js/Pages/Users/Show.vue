<template>
  <Head>
    <title>{{ user.name }}</title>
  </Head>
  <div class="max-w-6xl mx-auto my-20">
    <Link
      class="
        p-1
        bg-sky-400
        text-slate-700 text-xs
        font-semibold
        text-center
        mb-2
        rounded
        shadow-lg
      "
      href="/users"
      >Back</Link
    >

    <h1 class="text-4xl font-semibold text-slate-800">{{ user.name }}</h1>
    <p class="text-lg text-slate-800 font-semibold">{{ user.email }}</p>
    <p class="text-lg text-slate-800 font-semibold">
      Joined: {{ user.created_at }}
    </p>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
  },
};
</script>
