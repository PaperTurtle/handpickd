function productEdit() {
	return {
		newImages: [],
		imageCount: 0,
		maxImageCount: 3,
		removeImage(imageId, csrfToken, productId) {
			if (!confirm("Are you sure you want to delete this image?")) return;
			fetch(`/products/${productId}/images/` + imageId, {
				method: "DELETE",
				headers: {
					"X-CSRF-TOKEN": csrfToken,
				},
			})
				.then((response) => {
					if (!response.ok) throw response;
					return response.json();
				})
				.then((data) => {
					if (data.success) {
						this.$refs["image" + imageId].remove();
						this.imageCount--;
					} else {
						alert(data.message || "Server error occurred.");
					}
				})
				.catch((error) => {
					if (error instanceof Response) {
						error.json().then((body) => {
							console.error("Error:", body);
							alert(body.message || "Could not delete the image.");
						});
					} else {
						console.error("Error:", error);
						alert("Could not delete the image.");
					}
				});
		},
	};
}
