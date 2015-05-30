<?php namespace App\Http\Controllers;

use App\Exceptions\FrogCreationException;
use App\Exceptions\FrogCreationValidationException;
use App\Models\Frog;
use App\Services\FrogService;
use Illuminate\Http\Request;
use \Validator;

class FrogController extends Controller
{

    /**
     * Show the list of Frogs.
     *
     * @return Response
     */
    public function index()
    {
        return view('frog.index', ['frogs' => Frog::all()]);
    }

    /**
     * Show the create Frog form.
     *
     * @return Response
     */
    public function create()
    {
        return view('frog.create');
    }

    /**
     * Store the incoming frog.
     *
     * @param  Request $request
     * @param  FrogService $frogService
     * @return Response
     */
    public function store(Request $request, FrogService $frogService)
    {
        $data = $request->except(['_token', '_method']);
        try {
            $frogService->create($data);
        } catch (FrogCreationValidationException $e) {
            $this->notify->addFlash($e->getMessage(), 'danger');
            return redirect()->back()->withErrors($frogService->validator)->withInput();
        } catch (FrogCreationException $e) {
            $this->notify->addFlash($e->getMessage(), 'danger');
            return redirect()->back()->withInput();
        }
        $this->notify->addFlash('New frog as been added to your pond!', 'success');
        return redirect(route('frog.index'));
    }

    /**
     * Show frog edit form.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Laravel\Lumen\Http\Redirector
     */
    public function edit($id = 0)
    {
        $frog = Frog::find($id);
        if (!$frog) {
            return $this->notFoundBackToIndex();
        }
        return view('frog.edit', ['frog' => $frog]);
    }

    /**
     * Update the frog.
     *
     * @param  int $id
     * @param  Request $request
     * @param  FrogService $frogService
     * @return Response
     */
    public function update($id, Request $request, FrogService $frogService)
    {
        $frog = Frog::find($id);
        if (!$frog) {
            return $this->notFoundBackToIndex();
        }

        $frogService->setFrog($frog);

        $data = $request->except(['_token', '_method']);
        try {
            $frogService->update($data);
        } catch (FrogCreationValidationException $e) {
            $this->notify->addFlash($e->getMessage(), 'danger');
            return redirect()->back()->withErrors($frogService->validator)->withInput();
        } catch (FrogCreationException $e) {
            $this->notify->addFlash($e->getMessage(), 'danger');
            return redirect()->back()->withInput();
        }
        $this->notify->addFlash('Successfully updated your frog!', 'success');
        return redirect(route('frog.index'));
    }

    /**
     * Kill the frog.
     *
     * @param $id
     * @param FrogService $frogService
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function kill($id, FrogService $frogService)
    {
        $frog = Frog::find($id);
        if (!$frog) {
            return $this->notFoundBackToIndex();
        }
        try {
            $frogService->setFrog($frog);
            $frogService->feedToSnake();
        } catch (\Exception $e) {
            $this->notify->addFlash($e->getMessage(), 'warning');
        }
        $this->notify->addFlash('Yeah! you just killed a frog :( You happy now?!', 'success');
        return redirect(route('frog.index'));
    }

    /**
     * Mates with other frog to create a baby frog.
     * @param $id
     * @param Request $request
     * @param FrogService $frogService
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function mateWith($id, Request $request, FrogService $frogService)
    {
        $frog = Frog::find($id);
        if (!$frog) {
            return $this->notFoundBackToIndex();
        }

        $partnerId = $request->get('partner_id');

        if($partnerId)
        {
            $partnerFrog = Frog::find($partnerId);
            if (!$partnerFrog) {
                return $this->notFoundBackToIndex();
            }
            try
            {
                $frogService->setFrog($frog);
                $frogService->mateWith($partnerFrog);
                $this->notify->addFlash('Yeah baby! I mean a new baby frog was made!', 'success');
            }catch (\Exception $e)
            {
                $this->notify->addFlash($e->getMessage(), 'warning');
            }
            return redirect(route('frog.index'));
        }
        return view('frog.mate', ['frog' => $frog, 'partners' => Frog::all()]);
    }

    /**
     * Redirects back to the index if something is not found.
     *
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    protected function notFoundBackToIndex()
    {
        $this->notify->addFlash('Oops! That frog might be dead or not in this pond!', 'warning');
        return redirect(route('frog.index'));
    }
}