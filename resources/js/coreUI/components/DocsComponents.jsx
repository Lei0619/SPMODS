import PropTypes from 'prop-types';
import React from 'react';

import ComponentsImg from 'src/assets/images/components.webp';

const DocsComponents = (props) => (
    <div className="bg-opacity-10 mb-4 rounded border border-2 border-primary bg-primary">
        <div className="row d-flex align-items-center px-xl-4 flex-xl-nowrap p-3">
            <div className="col-xl-auto d-none d-xl-block col-12 p-0">
                <img
                    className="img-fluid"
                    src={ComponentsImg}
                    width="160px"
                    height="160px"
                    alt="CoreUI PRO hexagon"
                />
            </div>
            <div className="col-md px-lg-4 col-12">
                Our Admin Panel isn’t just a mix of third-party components. It’s{' '}
                <strong>
                    the only open-source React dashboard built on a
                    professional, enterprise-grade UI Components Library
                </strong>
                . This component is part of this library, and we present only
                the basic usage of it here. To explore extended examples,
                detailed API documentation, and customization options, refer to
                our docs.
            </div>
            <div className="col-md-auto mt-lg-0 d-flex flex-column col-12 mt-3">
                <a
                    className="btn btn-primary text-nowrap text-white"
                    href={`https://coreui.io/react/docs/${props.href}`}
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Explore Documentation
                </a>
                <div className="my-1 text-center">or</div>
                <a
                    className="btn btn-danger text-nowrap text-white"
                    href="https://coreui.io/pricing/?framework=react&src=free-react-admin-template-docs-banner"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Get CoreUI PRO →
                </a>
            </div>
        </div>
    </div>
);

DocsComponents.propTypes = {
    href: PropTypes.string,
};

export default DocsComponents;
