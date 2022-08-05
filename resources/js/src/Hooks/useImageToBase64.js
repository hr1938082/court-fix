const useImageToBase64 = (e) => {
    const files = e.target.files;
    return new Promise((resolve, reject) => {
        let data = [];
        for (let index = 0; index < files.length; index++) {
            const file = files[index];
            const reader = new FileReader();
            reader.onerror = () => {
                reader.abort();
                reject(new DOMException("Cant read Image"));
            }
            // reader.onprogress = ()
            reader.onload = () => {
                data.push(reader.result);
                if (files.length - 1  === index) {
                    resolve(data);
                }
            }
            reader.readAsDataURL(file);
        }
    })
};

export default useImageToBase64;

