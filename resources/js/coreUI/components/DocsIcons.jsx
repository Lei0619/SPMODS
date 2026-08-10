import React from 'react';

import IconsImg from 'src/assets/images/icons.webp';

const DocsIcons = () => (
    <div className="bg-warning bg-opacity-10 border-warning mb-4 rounded border border-2">
        <div className="row d-flex align-items-center px-xl-4 flex-xl-nowrap p-3">
            <div className="col-xl-auto d-none d-xl-block col-12 p-0">
                <img
                    className="img-fluid"
                    src={IconsImg}
                    width="160px"
                    height="160px"
                    alt="CoreUI Icons"
                />
            </div>
            <div className="col-md px-lg-4 col-12">
                CoreUI Icons package is delivered with more than 1500 icons in
                multiple formats SVG, PNG, and Webfonts. CoreUI Icons are
                beautifully crafted symbols for common actions and items. You
                can use them in your digital products for web or mobile app. For
                more information please visit our documentation.
            </div>
            <div className="col-md-auto mt-lg-0 col-12 mt-3">
                <a
                    className="btn btn-warning text-nowrap text-white"
                    href="https://coreui.io/react/docs/components/icon/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Explore Documentation
                </a>
            </div>
        </div>
    </div>
);

export default DocsIcons;
