import useRequest from "../useRequest"

const useContactUs = () => {
    const {get} = useRequest();
    const baseRoute = '/contact_us';

    const index = async() => {
        const res = await get(baseRoute);
        return res;
    }

    return {index};
}

export default useContactUs
