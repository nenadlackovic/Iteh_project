import { Injectable } from '@nestjs/common';
import {InjectRepository} from "@nestjs/typeorm";
import {Film} from "../entity/Film.entity";
import {Repository} from "typeorm";
import {Zanr} from "../entity/Zanr.entity";

@Injectable()
export class GenresService {

    constructor(
        @InjectRepository(Zanr)
        private genresRepository: Repository<Zanr>,
    ) {}

    async findAll() :Promise<Zanr[]> {
        return this.genresRepository.find();
    }
}
