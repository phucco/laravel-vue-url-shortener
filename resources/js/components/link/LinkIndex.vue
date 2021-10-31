<template>
    <div class="card">
        <div class="card-header">
            Your links
            <span class="float-right">Total: {{ links.length }}</span>
        </div>

        <div class="card-body">
            <form v-on:submit.prevent="addLink">
                <label for="destination">Please input the destination url:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="link.destination" autofocus="">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Shorten</button>
                    </div>
                </div>
            </form>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Slug</th>
                        <th>Destination</th>
                        <th>Times</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="item in links" :key="item.id">
                        <tr>
                            <td>{{ item.id }}</td>
                            <td>{{ item.slug }}</td>
                            <td><router-link v-bind:to="{ name: 'links.show', params: { slug: item.destination } }">{{ item.destination }}</router-link></td>
                            <td>{{ item.times }}</td>
                            <td>
                                <a class="btn btn-success mr-2" v-bind:href="item.slug">Show</a>
                                <button class="btn btn-danger" v-on:click="deleteLink(item.slug)">Delete</button>
                            </td>
                        </tr>
                    </template>
                 </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import useLinks from '../../composables/links'
import { onMounted, reactive } from 'vue'

export default {
    setup () {
        const { links, getLinks, storeLink, destroyLink } = useLinks()

        const link = reactive({
            destination: ''
        })

        const addLink = async () => {
            await storeLink({ ...link })
            await getLinks()

            link.destination = ''
        }

        const deleteLink = async (slug) => {
            if (! window.confirm('Are you sure?')) {
                return
            }

            await destroyLink(slug)
            await getLinks()
        }

        onMounted(getLinks)

        return {
            links,
            link,
            addLink,
            deleteLink
        }
    }
}
</script>