/* eslint-env browser */
/* globals betting_DIST_PATH */

/** Dynamically set absolute public path from current protocol and host */
if (betting_DIST_PATH) {
  __webpack_public_path__ = betting_DIST_PATH; // eslint-disable-line no-undef, camelcase
}
