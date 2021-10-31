import { ref } from 'vue'
import axios from 'axios'

export default function useLinks() {
    const links = ref([])
    const link = ref([])

    const getLinks = async () => {
        let response = await axios.get('/api/links/')
        links.value = response.data.data
    }

    const getLink = async (slug) => {
        let response = await axios.get('/api/links/' + slug)
        link.value = response.data.data
    }

    const storeLink = async (link) => {
        try {
            await axios.post('/api/links', link)
        } catch (e) {
            console.log(e.response)
        }
    }

    const updateLink = async (slug) => {
        try {
            await axios.patch('/api/links/' + slug)
        } catch (e) {
            console.log(e.response)
        }
    }

    const destroyLink = async (slug) => {
        try {
            await axios.delete('/api/links/' + slug)
        } catch (e) {
            console.log(e.response)
        }
    }

    return {
        links,
        link,
        getLinks,
        getLink,
        storeLink,
        updateLink,
        destroyLink
    }
}