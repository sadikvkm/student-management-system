<?php 

namespace App\Traits;
use Illuminate\Support\Str;

trait ControllerHelper {

    public function deleteCommonAction($id, $modal)
    {
        try {
            $id = crypt_decrypt($id);
        } catch (\Throwable $th) {
            $id = $id;
        }

        $modal::where('id', $id)->delete();
        return true;
    }

    public function changeCommonStatus($id, $modal)
    {
        try {
            $id = crypt_decrypt($id);
        } catch (\Throwable $th) {
            $id = $id;
        }

        $result = $modal::where('id', $id)->select('status')->first();

        $newStatus = 1;
        if($result->status == 1) {
            $newStatus = 0;
        }

        $modal::where('id', $id)->update(['status' => $newStatus]);

        return successResponse('updated', trans('application::messages.status-updated'));
    }
}