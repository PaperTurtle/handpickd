import sharp from "sharp";

const [inputPath, outputPath] = process.argv.slice(2);

sharp(inputPath)
	.resize(240, 240)
	.webp({ quality: 100 })
	.toFile(outputPath)
	.then(() => console.log("Image processed and saved successfully"))
	.catch((err) => console.error("Error processing image:", err));
