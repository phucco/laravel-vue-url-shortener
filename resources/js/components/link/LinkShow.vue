<template>
    <div class="card">
        <div class="card-header">
            Your link has been decoded!
        </div>

        <div class="card-body text-center">
            <p class="lead">This is the destination:</p>

            <p class="lead fw-bold">
                <a v-bind:href="link.destination" target="_blank">{{ link.destination }}</a>
            </p>

            <a class="btn btn-success btn-lg text-center" v-bind:href="link.destination" role="button" target="_blank">Go to the destination »</a>

            <p class="mt-3">Created at: {{ link.created_at }}, visited {{ link.times + 1 }} times.</p>
        </div>
    </div>
</template>

<script>
import useLinks from '../../composables/links'
import { onMounted } from 'vue'

export default {
    props: {
        slug: {
            required: true,
            type: String
        }
    },
    setup (props) {
        const { link, getLink, updateLink } = useLinks()

        onMounted(() => {
            getLink(props.slug)
            updateLink(props.slug)
        })

        return {
            link
        }
    }
}
</script>