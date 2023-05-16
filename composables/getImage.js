const getImage = async id => {

	const config = useRuntimeConfig()
	const { data, pending, error } = await useAsyncData(() => $fetch( `${config.API_URL}/media/${id}`) )


	if( !pending.value ){
		if( error.value ){
			console.log(`Se ha productido un error al cargar la imagen ${id}`)
		}else{
			return {
				src: data.value.guid.rendered,
				alt: data.value.slug
			}
		}
	}

}


export default getImage