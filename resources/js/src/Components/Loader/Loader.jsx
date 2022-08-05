import React, { memo, Suspense } from 'react';
import PropTypes from 'prop-types';
import Loading from './Loading';

const Loader = ( props) => {
    const {loader, element} = props
  return (
      <Suspense fallback={loader ? loader : <Loading/>}>
          {element}
      </Suspense>
  )
}

Loader.propTypes = {
    loader: PropTypes.node,
    element: PropTypes.node.isRequired
}

export default memo(Loader)
